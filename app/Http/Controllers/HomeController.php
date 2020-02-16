<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

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

        return view('index', [
            'products' => $products,
            'categories' => $categories
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
