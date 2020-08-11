<?php


namespace App\Services\GeoLocation;


use Illuminate\Support\Facades\Http;

abstract class GeoLocation
{
    abstract public function getLocation(): Location;
}
