<?php

namespace TomyKho\Here;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use TomyKho\Here\Models\GeocodeQuery;

class Here
{
    const HERE_GEOCODE_URL = 'https://geocode.search.hereapi.com/v1/geocode';

    static function geocode(GeocodeQuery $query)
    {
        $qq = $query->value();
        $key = 'geocode:' . sha1(urlencode($qq));
        $connection = config('here-laravel.cache.connection');
        $value = null;
        $redis = null;
        if ($connection) {
            $redis = Redis::connection($connection);
            $value = $redis->get($key);
            if ($value) {
                $value = json_decode($value, true);
                $requested_at = Carbon::parse($value['requested_at']);
                $expired_at = $requested_at->add(config('here-laravel.cache.duration'));
                if (now()->gte($expired_at)) {
                    $value = null;
                }
            }
        }
        \Log::info($connection);
        if (!$value) {
            $response = Http::get(self::HERE_GEOCODE_URL, [
                'apiKey' => config('here-laravel.api_key'),
                'qq' => $qq,
            ]);
            $value = $response->json();
            $value['query'] = $query->toArray();
            $value['requested_at'] = now()->toISOString();
            if ($redis) {
                $redis->set($key, json_encode($value));
            }
        }
        return $value['items'];
    }
}
