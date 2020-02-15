<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProduct as CreateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $categories = ProductCategory::with(['types'])->get();

        return view('admin/create_product', [
            'categories' => $categories
        ]);
    }

    public function create(CreateProductRequest $request)
    {
        $data = $request->validated();

        $product = Product::create([
            'name' => $data['date'],
            'category_id' => $data['category'],
            'cost' => $data['cost']
        ]);
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
