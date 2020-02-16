<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUser as CreateUserRequest;
use App\Http\Requests\Admin\UpdateUser as UpdateUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function listView()
    {
        $users = User::all();

        return view('admin.users_list', [
            'users' => $users
        ]);
    }

    public function createForm()
    {
        $roles = Role::all();

        return view('admin/create_user', [
            'roles' => $roles
        ]);
    }

    public function create(CreateUserRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(16);

        User::create([
            'email' => $data['email'],
            'phone' => $data['email'],
            'name' => $data['name'],
            'address' => $data['address'],
            'role_id' => $data['role']
        ]);

        return redirect('admin/users');
    }

    public function updateForm($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.update_user', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);
        
        if (!empty($request->image)) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
        } else {
            $imageName = null;
        }
        
        $product->update([
            'name' => $data['name'] ?? $product->name,
            'description' => $data['description'] ?? $product->description,
            'image' => $imageName ?? $product->image,
            'cost' => $data['cost'] ?? $product->cost
        ]);

        foreach($data['characteristics'][$product->category_id] as $characteristic) {
            Characteristic::where([
                'product_id' => $product->id,
                'type_id' => $product->category_id,
            ])->update([
                'value' => $characteristic
            ]);
        }

        return redirect('admin/products/update/form/' . $id);
    }
}
