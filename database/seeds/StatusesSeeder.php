<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'key' => 'new',
                'name' => 'New order'
            ],
            [
                'key' => 'in_process',
                'name' => 'In process'
            ],
            [
                'key' => 'completed',
                'name' => 'Completed'
            ],
        ];

        foreach ($statuses as $status) {
            \App\Models\Status::create($status);
        }
    }
}
