<?php

use Illuminate\Database\Seeder;

class DeliveryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryTypes = [
            [
                'name' => 'Nova Poshta',
                'description' => 'Nova Poshta is the leader in the logistics market, which provides easy delivery to each client - to the post office, post office, at the address - and allows thousands of entrepreneurs to create and develop a business not only in Ukraine but also abroad. The network of the company has more than 6,000 branches throughout Ukraine, and the number of departures in 2019 alone exceeded 212 million.'
            ],
            [
                'name' => 'UKR Poshta',
                'description' => 'Ukrposhta JSC is the only national postal operator of Ukraine. We call it simple: the country\'s main post office. UkrPoshta is the largest network: more than 11,000 branches provide coverage in 100% of Ukrainian settlements. Our business is mail, logistics, finance and trade. We provide more than 50 different services for individuals and corporate clients.'
            ]
        ];

        foreach ($deliveryTypes as $deliveryType) {
            \App\Models\DeliveryType::create($deliveryType);
        }
    }
}
