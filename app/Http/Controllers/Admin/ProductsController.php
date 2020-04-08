<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProduct as CreateProductRequest;
use App\Http\Requests\Admin\UpdateProduct as UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Characteristic;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function listView()
    {
        $products = Product::all();

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
                'type_id' => $characteristic['type'],
                'value' => $characteristic['value']
            ]);
        }

        return redirect('admin/products');
    }

    public function updateForm($id)
    {
        $product = Product::findOrFail($id);
        $product->load('characteristics');

        return view('admin.update_product', [
            'product' => $product
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);

        if (!empty($request->image)) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        $product->update([
            'name' => $data['name'] ?? $product->name,
            'description' => $data['description'] ?? $product->description,
            'image' => $imageName ?? $product->image,
            'cost' => $data['cost'] ?? $product->cost
        ]);

        foreach($data['characteristics'] as $characteristic) {
            Characteristic::where([
                'product_id' => $product->id,
                'type_id' => $characteristic['type'],
            ])->update([
                'value' => $characteristic['value']
            ]);
        }

        return redirect('admin/products/update/form/' . $id);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->characteristics()->delete();
        $product->delete();

        return redirect('admin/products');
    }
}
