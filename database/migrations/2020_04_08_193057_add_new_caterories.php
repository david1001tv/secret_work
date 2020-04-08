<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewCaterories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $newCategories = ['Motherboards', 'Processors', 'RAM', 'Video Cards'];

        foreach ($newCategories as $category) {
            \App\Models\ProductCategory::create([
                'name' => $category
            ]);
        }

        $categories = \App\Models\ProductCategory::whereIn('name', $newCategories)->get();
        $characteristicsTypes = [
            'Motherboards' => [
                'Manufacturer',
                'Socket',
                'Chipset',
                'Memory frequency',
                'RAM slots'
            ],
            'Processors' => [
                'Series',
                'Generation',
                'CPU Socket',
                'Nucleus',
                'Number of threads'
            ],
            'RAM' => [
                'Type',
                'Working frequency',
                'Number of module',
                'Supply voltage',
                'Volume',
            ],
            'Video Cards' => [
                'Chip maker',
                'Graphics chip',
                'Chip frequency during overclocking',
                'Interface',
                'The amount of internal memory, GB',
                'Memory type',
                'Memory frequency'
            ],
        ];

        foreach ($categories as $category) {
            foreach ($characteristicsTypes[$category->name] as $characteristicsType) {
                \App\Models\CharacteristicType::create([
                    'name' => $characteristicsType,
                    'category_id' => $category->id
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
