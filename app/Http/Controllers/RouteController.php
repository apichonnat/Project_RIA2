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
        $clients = [];

        array_push($clients, $request->input('client1') == 0 ? null : Customers::find($request->input('client1')));
        array_push($clients, $request->input('client2') == 0 ? null : Customers::find($request->input('client2')));
        array_push($clients, $request->input('client3') == 0 ? null : Customers::find($request->input('client3')));
        array_push($clients, $request->input('client4') == 0 ? null : Customers::find($request->input('client4')));
        array_push($clients, $request->input('client5') == 0 ? null : Customers::find($request->input('client5')));

        foreach ($clients as $client)
        {
            if ($client != null)
            {
                $coordinated = $this->getCoordinatedWithAddress($client->street, $client->street_number, $client->city, $client->npa, $matrixKey);

                if ($coordinated->status != "OK")
                {
                    echo  "une erreur c'est produite, l'adresse entrée n'a pas été trouvée";
                    //appelera une vue avec l'erreur.
                }
                else
                {
                    print_r($client->user->id);
                    print_r("<br>");
                    print_r($coordinated->results[0]->geometry->location);
                    print_r("<br>");

                }

            }
        }
    }


    public function getCoordinatedWithAddress($street, $street_number, $city, $npa, $key)
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$street." ".$street_number.", ".$city." ,".$npa."&key=".$key;
        $url = str_replace(" ", "+", $url);

        $response = file_get_contents($url);
        return json_decode($response);
    }


}
