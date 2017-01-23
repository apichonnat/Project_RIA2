<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Customers;

use App\Helpers\CrossingPoint;
use App\Helpers\GeocodeApi;
use App\Helpers\GoogleMatrixApi;
use App\Helpers\CalculatingPaths;

class RouteController extends Controller
{

    public function route(Request $request)
    {
        $matrixKey = "AIzaSyBrZwh2t9XNCUw_jrZGmbyOb9C-mRkA8b8";
        $apiKeySms = "e3w1i4p4zVmtY4eKP7DodsNaysnsrGep";
        $driver = Driver::find($request->input('driver'));

        $clients = [];
        $crossingPoints = [];
        $alltrajets = [];

        array_push($clients, $request->input('startEnd') == 0 ? null : Customers::find($request->input('startEnd')));
        array_push($clients, $request->input('client1') == 0 ? null : Customers::find($request->input('client1')));
        array_push($clients, $request->input('client2') == 0 ? null : Customers::find($request->input('client2')));
        array_push($clients, $request->input('client3') == 0 ? null : Customers::find($request->input('client3')));
        array_push($clients, $request->input('client4') == 0 ? null : Customers::find($request->input('client4')));

        $startEnd = $clients[0]->id;

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
                    $point = new CrossingPoint($client->id, $object->lat, $object->lng);
                    array_push($crossingPoints, $point);
                }
            }
        }
        for ($i = 0; $i < count($crossingPoints); $i++)
        {
            for ($j = $i+1; $j < count($crossingPoints); $j++)
            {
                $value = GoogleMatrixApi::calculatedDistance($crossingPoints[$i]->getLat(), $crossingPoints[$i]->getLng(), $crossingPoints[$j]->getLat(), $crossingPoints[$j]->getLng(), $matrixKey);
                $key = $crossingPoints[$i]->getId().$crossingPoints[$j]->getId();
                $value["start"] = $crossingPoints[$i]->getId();
                $value["end"] = $crossingPoints[$j]->getId();
                $alltrajets[$key] = $value;
//                array_push($alltrajets, $value);
            }
        }

        $point = array_values(array_unique(str_split(implode(array_keys($alltrajets)))));
        array_shift($point);
        $chemins = CalculatingPaths::calculated($point);

        foreach ($chemins as $chemin)
        {
            array_unshift($chemin, $startEnd);
            array_push($chemin, $startEnd);
            $trajects[] = $chemin;
        }

        $fastestRoute = CalculatingPaths::calculatedTrajects($trajects, $alltrajets);
        $return = [];
        $sms = [];

        foreach ($fastestRoute["traject"] as $traject)
        {
            $tab["lastName"] = Customers::find($traject)->user->last_name;
            $tab["firstName"] = Customers::find($traject)->user->first_name;
            $tab["address"] = Customers::find($traject)->street." ".Customers::find($traject)->street_number;
            $tab["city"] = Customers::find($traject)->city." ".Customers::find($traject)->npa;

            $val["firstName"] = Customers::find($traject)->user->first_name;
            $val["lastName"] = Customers::find($traject)->user->last_name;
            array_push($sms, $val);
            array_push($return, $tab);
        }


        return json_encode($return);
//        print_r($fastestRoute);
    }
}
