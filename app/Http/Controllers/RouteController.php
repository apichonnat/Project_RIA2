<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Customers;

class RouteController extends Controller
{

    public function route(Request $request)
    {
        $matrixKey = "AIzaSyAU0ICqkBTdOR5WWaQp78F5QuRSU_SxS94";

        $driver = Driver::find($request->input('driver'));

        $client1 = $request->input('client1') == 0 ? null : Customers::find($request->input('client1'));
        $client2 = $request->input('client2') == 0 ? null : Customers::find($request->input('client2'));
        $client3 = $request->input('client3') == 0 ? null : Customers::find($request->input('client3'));
        $client4 = $request->input('client4') == 0 ? null : Customers::find($request->input('client4'));
        $client5 = $request->input('client5') == 0 ? null : Customers::find($request->input('client5'));

        $CoordinatedClient1 = $this->getCoordinatedWithAddress($client1->street, $client1->street_number, $client1->street_number);


        var_dump($CoordinatedClient1);

    }



    public function getCoordinatedWithAddress($street, $street_number, $city)
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$street." ".$street_number.",+".$city;
        $url = str_replace(" ", "+", $url);

        $response = file_get_contents($url);
        return $response;
    }
}
