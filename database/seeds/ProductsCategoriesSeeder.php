<?php

use Illuminate\Database\Seeder;

class ProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Laptops & Netbooks', 'Desktops', 'Printers', 'Tablets', 'Monitors'];

        foreach ($categories as $category) {
            \App\Models\ProductCategory::create([
                'name' => $category
            ]);
        }
    }
}
