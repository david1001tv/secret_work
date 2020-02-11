<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //TODO: make return view maybe with some data
        return true;
    }

    public function me()
    {
        $user = Auth::user();

        //TODO: return view with prepared data
        return $user;
    }

    //TODO: make update my data request
    public function update()
    {

    }

    public function orders()
    {
        $user = Auth::user();
        $userOrders = $user->orders()->get();

        //TODO: return view with prepared data
        return $userOrders;
    }
}
