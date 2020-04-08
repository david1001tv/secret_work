<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\UpdateMe as UpdateMeRequest;
use App\Models\Order;
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
        $orders = $user->orders()->get();

        return view('account', [
            'user' => $user,
            'orders' => $orders
        ]);
    }

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

    public function orderDetails($id)
    {
        $user = Auth::user();
        $order = Order::findOrFail($id);

        if ($user->id !== $order->user_id) {
            abort(403, "It's not your order");
        }
        $order->load(['carts', 'deliveryType']);

        return view('dashboard.order_details', [
            'order' => $order
        ]);
    }
}
