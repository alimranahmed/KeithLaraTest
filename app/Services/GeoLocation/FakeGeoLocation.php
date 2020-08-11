<?php


namespace App\Services\GeoLocation;


class FakeGeoLocation extends GeoLocation
{

    public function getLocation(): Location
    {
        return new Location('192.168.0.1', 'BD', 'Bangladesh', 'Dhaka', 1207);
    }
}
