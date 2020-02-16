<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $category = $request->input('category');
        $categories = ProductCategory::all();

        if (empty($category)) {
            $products = Product::all();
        } else {
            $products = Product::where('category_id', $category)->get();
        }

        $user = Auth::user();
        if ($user) {
            $currentCart = Cache::get('user_cart_' . $user->id);
        }

        return view('index', [
            'products' => $products,
            'categories' => $categories,
            'cartCount' => isset($currentCart) ? count($currentCart) : 0
        ]);
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->load('characteristics');

        return view('product_info', [
            'product' => $product
        ]);
    }
}
