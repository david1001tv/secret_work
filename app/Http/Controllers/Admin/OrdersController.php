<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateOrder as UpdateOrderRequest;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Status;

class OrdersController extends Controller
{
    public function listView()
    {
        $orders = Order::all();

        return view('admin.orders_list', [
            'orders' => $orders
        ]);
    }

    public function updateForm($id)
    {
        $order = Order::findOrFail($id);
        $statuses = Status::all();


        return view('admin.update_orders', [
            'order' => $order,
            'statuses' => $statuses
        ]);
    }

    public function update(UpdateOrderRequest $request, $id)
    {
        $data = $request->validated();
        $order = Order::findOrFail($id);
        $order->update([
            'status_id' => $data['status']
        ]);

        return redirect('admin/orders/update/form/' . $id);
    }

    public function orderDetails($id)
    {
        $order = Order::findOrFail($id);
        $order->load('carts');

        return view('admin.order_details', [
            'order' => $order
        ]);
    }
}
