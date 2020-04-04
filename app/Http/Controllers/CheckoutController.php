<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\Checkout as CheckoutRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckoutController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = (int)$request->input('product_id');
        $isToCheckout = (bool)$request->input('is_to_checkout');
        $count = $request->input('count', 1);
        $user = Auth::user();

        if (!empty($productId)) {
            $currentCart = Cache::get('user_cart_' . $user->id);

             if (empty($currentCart)) {
                 $currentCart = [
                     [
                         'count' => $count,
                         'product_id' => $productId
                     ]
                 ];

                 Cache::forever('user_cart_' . $user->id, $currentCart);
             } else {
                 $isNew = true;
                 foreach ($currentCart as $key => $item) {
                     if ($currentCart[$key]['product_id'] === $productId) {
                         $currentCart[$key]['count'] += $count;
                         $isNew = false;
                         break;
                     }
                 }

                 if ($isNew) {
                     $currentCart[] = [
                         'count' => $count,
                         'product_id' => $productId
                     ];
                 }

                 Cache::forget('user_cart_' . $user->id);
                 Cache::forever('user_cart_' . $user->id, $currentCart);
             }

            if ($isToCheckout) {
                return redirect('/checkout');
            } else {
                return $currentCart;
            }
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

        if (empty($products)) {
            return redirect('/');
        }

        return view('checkout', [
            'products' => $products
        ]);
    }

    public function makeOrder(CheckoutRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        $statusId = Status::where('key', 'new')->value('id');
        $cart = [];
        $totalCost = 0;

        foreach ($data['products'] as $key => $data) {
            $cart[] = [
                'product' => Product::findOrFail($data['id']),
                'count' => $data['count']
            ];
            $totalCost += $cart[$key]['product']->cost * $data['count'];
        }

        $order = Order::create([
            'cost' => $totalCost,
            'user_id' => $user->id,
            'status_id' => $statusId
        ]);

        foreach ($cart as $item) {
            Cart::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'count' => $item['count']
            ]);
        }
        Cache::forget('user_cart_' . $user->id);

        return redirect('dashboard/me');
    }

    public function clearCart()
    {
        $user = Auth::user();
        Cache::forget('user_cart_' . $user->id);

        return redirect('/');
    }
}
