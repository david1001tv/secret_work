<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(StatusesSeeder::class);
         $this->call(ProductsCategoriesSeeder::class);
         $this->call(CharacteristicsTypesSeeder::class);
//         $this->call(ProductsSeeder::class);
//         $this->call(CharacteristicsSeeder::class);
    }
}
