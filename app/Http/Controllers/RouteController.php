<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Customers;

class RouteController extends Controller
{
    public function route(Request $request)
    {
        echo Driver::find($request->input('driver'))->user->first_name;
        echo Customers::find($request->input('client1'))->street;
    }
}
