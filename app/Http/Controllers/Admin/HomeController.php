<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        // $orders = Order::all();

        // return view('admin.panel', [
        //     'orders' => $orders
        // ]);
    }
}
