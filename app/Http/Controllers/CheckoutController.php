<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\Checkout as CheckoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function form(Request $request)
    {
        $productId = $request->input('productId');

        if (empty($productId)) {
            return abort(404);
        }

        $product = Product::findOrFail($productId);

        return view('checkout_form', [
            'product' => $product
        ]);
    }

    public function makeOrder(CheckoutRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        $product = Product::findOrFail($data['product']);

        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'count' => $data['count'],
            'cost' => $product->cost * $data['count'],
        ]);

        return redirect('dashboard/orders');
    }
}
