<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function route(Request $request)
    {
        echo $request->input('driver');
    }
}
