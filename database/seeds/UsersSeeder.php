<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientRoleId = \App\Models\Role::where('name', 'client')->value('id');
        $adminRoleId = \App\Models\Role::where('name', 'admin')->value('id');
        $managerRoleId = \App\Models\Role::where('name', 'manager')->value('id');

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => '12345678',
                'phone' => '88005553535',
                'address' => 'test address',
                'role_id' => $adminRoleId
            ],
            [
                'name' => 'client',
                'email' => 'client@email.com',
                'password' => '12345678',
                'phone' => '88005553535',
                'address' => 'test address',
                'role_id' => $clientRoleId
            ],
            [
                'name' => 'manager',
                'email' => 'manager@email.com',
                'password' => '12345678',
                'phone' => '88005553535',
                'address' => 'test address',
                'role_id' => $managerRoleId
            ]
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
