<?php


namespace App\Services\GeoLocation;


class Location
{
    protected $ip;
    protected $countryCode;
    protected $countryName;
    protected $city;
    protected $zipCode;

    /**
     * Location constructor.
     * @param $ip
     * @param $countryCode
     * @param $countryName
     * @param $city
     * @param $zipCode
     */
    public function __construct($ip, $countryCode, $countryName, $city, $zipCode)
    {
        $this->ip = $ip;
        $this->countryCode = $countryCode;
        $this->countryName = $countryName;
        $this->city = $city;
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
