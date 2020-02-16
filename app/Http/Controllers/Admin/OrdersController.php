<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateOrder as UpdateOrderRequest;
use App\Models\Order;
use App\Http\Controllers\Controller;

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

        return view('admin.update_orders', [
            'order' => $order
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
}
