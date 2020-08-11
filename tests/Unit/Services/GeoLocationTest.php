<?php

namespace Tests\Unit\Services;


use App\Services\GeoLocation\FakeGeoLocation;
use App\Services\GeoLocation\GeoLocation;
use App\Services\GeoLocation\Location;
use Tests\TestCase;

class GeoLocationTest extends TestCase
{
    public function testGetLocation()
    {
        app()->bind(GeoLocation::class, FakeGeoLocation::class);
        $geoLocation = app(GeoLocation::class);

        $location = $geoLocation->getLocation();

        $this->assertInstanceOf(Location::class, $location);
        $this->assertNotEmpty($location->getCountryCode());
        $this->assertNotEmpty($location->getCountryName());
        $this->assertNotEmpty($location->getCity());
        $this->assertNotEmpty($location->getZipCode());
    }
}
