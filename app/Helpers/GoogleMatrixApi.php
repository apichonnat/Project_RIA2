<?php

namespace App\Helpers;

class GoogleMatrixApi
{
    public static function calculatedDistance($latPoint1, $lngPoint1, $latPoint2, $lngPoint2, $key)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$latPoint1.", ".$lngPoint1."&destinations=".$latPoint2.", ".$lngPoint2."&key=".$key;
        $url = str_replace(" ", "+", $url);

        $response = file_get_contents($url);

        $response = json_decode($response);
        $tab["distance"] = $response->rows[0]->elements[0]->distance->value;
        $tab["duration"] = $response->rows[0]->elements[0]->duration->value;
        return $tab;
//        return $response->rows[0]->elements[0];
    }

}
