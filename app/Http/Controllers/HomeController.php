<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function show(Request $request)
    {
        $category = $request->input('category');

        if (empty($category)) {
            return abort(404);
        }

        $products = Product::where('category_id', $category)->get();

        return view('products_list', [
            'products' => $products
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
