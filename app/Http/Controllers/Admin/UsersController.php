<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUser as CreateUserRequest;
use App\Http\Requests\Admin\UpdateUser as UpdateUserRequest;
use App\Models\User;
use App\Models\Role;
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
            'role_id' => $data['role'],
            'password' => $password
        ]);

        //TODO send mail with password

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
        $user = User::findOrFail($id);

        $user->update([
            'phone' => $data['email'],
            'name' => $data['name'],
            'address' => $data['address'],
            'role_id' => $data['role']
        ]);

        return redirect('admin/users/update/form/' . $id);
    }
}
