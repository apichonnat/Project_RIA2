<?php 

namespace App\Http\Controllers;


use App\Models\Customers;

class IndexController extends Controller
{

  public function __construct()
  {

  }

    public function index()
    {
        $isLoggedIn = \Auth::check();
        $clients = Customers::all();
        return view('index')
            ->with('isLoggedIn', $isLoggedIn)
            ->with('clients', $clients);
    }

    public function login()
    {
        $isLoggedIn = \Auth::check();
        $auth0Config = config('laravel-auth0');
        return view('login')
            ->with('isLoggedIn', $isLoggedIn)
            ->with('auth0Config',$auth0Config);
    }

  public function logout() 
  {
    \Auth::logout();
    return  \Redirect::intended('/');
  }

    public function dump()
    {
        $user = \Auth::user()->getUserName();
        $isLoggedIn = \Auth::check();
        return $user;
//    return view('dump')
//      ->with('isLoggedIn', $isLoggedIn)
//      ->with('user',\Auth::user()->getUserInfo());
    }
}