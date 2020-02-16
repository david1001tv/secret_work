<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $ordersCount = Order::count();
        $usersCount = User::count();
        $productsCount = Product::count();

        return view('admin.panel', [
            'ordersCount' => $ordersCount,
            'usersCount' => $usersCount,
            'productsCount' => $productsCount
        ]);
    }
}
