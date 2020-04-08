<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $category = 'Power Supply';

        $newCategory = \App\Models\ProductCategory::create([
            'name' => $category
        ]);

        $newCharacteristics = [
            'Power','Sizes, weight','Cooling','Maximum load', 'Number of SATA Connectors', 'CPU Power Connector Type', 'Type of connector for connecting to the motherboard'
        ];

        foreach ($newCharacteristics as $characteristic) {
            \App\Models\CharacteristicType::create([
                'name' => $characteristic,
                'category_id' => $newCategory->id
            ]);
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
