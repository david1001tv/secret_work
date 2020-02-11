<?php

use Illuminate\Database\Seeder;

class CharacteristicsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Models\ProductCategory::all();

        $characteristicsTypes = [
            'Laptops & Netbooks' => [
                'Display',
                'Processor',
                'RAM',
                'ROM (HDD/SSD)',
                'Video Card',
                'OS',
                'Color',
                'Weight',
                'Additional information'
            ],
            'Desktops' => [
                'Mother Board',
                'Processor',
                'RAM',
                'ROM (HDD/SSD)',
                'Video Card',
                'OS',
                'Color',
                'Weight',
                'Ports',
                'Additional information',
            ],
            'Printers' => [
                'Maximum print resolution',
                'Printing technology',
                'Number of colors',
                'Paper Size and Weight',
                'Weight',
                'Size'
            ],
            'Monitors' => [
                'Diagonal',
                'Maximal resolution',
                'Matrix type',
                'Update frequency',
                'Interfaces',
                'Color',
                'Maximum number of colors'
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
}
