<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Customers;

use App\Helpers\CrossingPoint;
use App\Helpers\GeocodeApi;
use App\Helpers\GoogleMatrixApi;

class RouteController extends Controller
{

    public function route(Request $request)
    {
        $matrixKey = "AIzaSyBrZwh2t9XNCUw_jrZGmbyOb9C-mRkA8b8";
        $driver = Driver::find($request->input('driver'));
        $clients = [];
        $crossingPoints = [];
        $alltrajets = [];

        array_push($clients, $request->input('client1') == 0 ? null : Customers::find($request->input('client1')));
        array_push($clients, $request->input('client2') == 0 ? null : Customers::find($request->input('client2')));
        array_push($clients, $request->input('client3') == 0 ? null : Customers::find($request->input('client3')));
        array_push($clients, $request->input('client4') == 0 ? null : Customers::find($request->input('client4')));
        array_push($clients, $request->input('client5') == 0 ? null : Customers::find($request->input('client5')));

        foreach ($clients as $client)
        {
            if ($client != null)
            {
                $coordinated = GeocodeApi::getCoordinatedWithAddress($client->street, $client->street_number, $client->city, $client->npa, $matrixKey);
                if ($coordinated->status != "OK")
                {
                    echo  "une erreur c'est produite, l'adresse entrée n'a pas été trouvée";
                    //appelera une vue avec l'erreur.
                }
                else
                {
                    $object = $coordinated->results[0]->geometry->location;
                    $point = new CrossingPoint($client->user->id, $object->lat, $object->lng);
                    array_push($crossingPoints, $point);
                }

            }
        }
        for ($i = 0; $i < count($crossingPoints); $i++)
        {
            for ($j = $i+1; $j < count($crossingPoints); $j++)
            {
                $value = GoogleMatrixApi::calculatedDistance($crossingPoints[$i]->getLat(), $crossingPoints[$i]->getLng(), $crossingPoints[$j]->getLat(), $crossingPoints[$j]->getLng(), $matrixKey);
                array_push($alltrajets, $value);
            }
        }


        var_dump($alltrajets);


    }
}
