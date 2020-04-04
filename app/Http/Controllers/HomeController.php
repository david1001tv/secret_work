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
        $search = $request->input('search');
        $categories = ProductCategory::all();

        if (empty($category)) {
            $products = Product::all();
        } else {
            $products = Product::where('category_id', $category)->get();
        }

        if (!empty($search)) {
            $products = $products->where('name', $search);
        }

        return view('index', [
            'products' => $products,
            'categories' => $categories,
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
