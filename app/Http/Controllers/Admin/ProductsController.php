<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function listView()
    {
        $products = Product::all();
        //TODO: add return view with list of products
        return true;
    }

    public function createForm()
    {
        //TODO: add return view create form
        return true;
    }

    public function create(Request $request)
    {
        $data = $request->post();
    }

    public function updateForm($id)
    {
        $product = Product::find($id);
        //TODO: add return view update form with selected product or 404 error page
        return true;
    }

    public function update(Request $request, $id)
    {

    }
}
