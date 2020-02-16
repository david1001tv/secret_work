<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\UpdateMe as UpdateMeRequest;
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
        return view('account', ['user' => $user]);
    }

    //TODO: make update my data request
    public function update(UpdateMeRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();

        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);

        return redirect('dashboard/me');
    }

    public function orders()
    {
        $user = Auth::user();
        $userOrders = $user->orders()->get();

        //TODO: return view with prepared data
        return $userOrders;
    }
}
