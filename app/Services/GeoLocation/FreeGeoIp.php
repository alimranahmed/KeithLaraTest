<?php


namespace App\Services\GeoLocation;


use Illuminate\Support\Facades\Http;

class FreeGeoIp extends GeoLocation
{

    public function getLocation(): Location
    {
        $response = Http::get("https://freegeoip.app/json");
        $data = $response->json();
        return new Location(
            $data['ip'],
            $data['country_code'],
            $data['country_name'],
            $data['city'],
            $data['zip_code']
        );
    }
}
