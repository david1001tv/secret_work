<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProduct as CreateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Characteristic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function listView()
    {
        $products = Product::all();
        //TODO: add return view with list of products
        return view('admin.products_list', [
            'products' => $products
        ]);
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
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        $product = Product::create([
            'name' => $data['name'],
            'category_id' => $data['category'],
            'description' => $data['description'],
            'image' => $imageName,
            'cost' => $data['cost']
        ]);
        request()->image->move(public_path('images'), $imageName);

        foreach($data['characteristics'][$product->category_id] as $characteristic) {
            Characteristic::create([
                'product_id' => $product->id,
                'type_id' => $product->category_id,
                'value' => $characteristic
            ]);
        }

        $products = Product::all();

        return view('admin.products_list', [
            'products' => $products
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
