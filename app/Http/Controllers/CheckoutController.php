<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\Checkout as CheckoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckoutController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $count = $request->input('count');
        $user = Auth::user();

        if (!empty($productId)) {
            $currentCart = Cache::get('user_cart_' . $user->id);

             if (empty($currentCart)) {
                 $currentCart = [
                     [
                         'count' => $count ?? 1,
                         'product_id' => (int)$productId
                     ]
                 ];

                 Cache::forever('user_cart_' . $user->id, $currentCart);
             } else {
                 $currentCart[] = [
                     'count' => $count ?? 1,
                     'product_id' => (int)$productId
                 ];

                 Cache::forget('user_cart_' . $user->id);
                 Cache::forever('user_cart_' . $user->id, $currentCart);
             }

            return $currentCart;
        } else {
            return abort(400);
        }
    }

    public function form(Request $request)
    {
        $user = Auth::user();
        $currentCart = Cache::get('user_cart_' . $user->id, []) ;
        $products = [];

        foreach ($currentCart as $cart) {
            $products[] = [
                'product' => Product::find($cart['product_id']),
                'count' => $cart['count']
            ];
        }

        return view('checkout_form', [
            'products' => $products
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
