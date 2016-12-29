<?php

namespace App\Helpers;

class GeocodeApi
{
    public static function getCoordinatedWithAddress($street, $street_number, $city, $npa, $key)
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$street." ".$street_number.", ".$city." ,".$npa."&key=".$key;
        $url = str_replace(" ", "+", $url);

        $response = file_get_contents($url);
        return json_decode($response);
    }
}