<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{

    protected $shops = [
        [
            'status' => 'active',
            'average_visit' => '258',
            'payment_due' => '2020-04-05',
            'tv_id' => 'tv004',
            'iot_id' => 'iot005',
            'android_box_id' => 'abd004',
        ],
        [
            'status' => 'active',
            'average_visit' => '221',
            'payment_due' => '2020-04-02',
            'tv_id' => 'tv005',
            'iot_id' => 'iot005',
            'android_box_id' => 'abd004',
        ],
        [
            'status' => 'active',
            'average_visit' => '194',
            'payment_due' => '2020-04-11',
            'tv_id' => 'tv001',
            'iot_id' => 'iot005',
            'android_box_id' => 'abd004',
        ],
        [
            'status' => 'active',
            'average_visit' => '246',
            'payment_due' => '2020-05-03',
            'tv_id' => 'tv012',
            'iot_id' => 'iot005',
            'android_box_id' => 'abd004',
        ],
        [
            'status' => 'active',
            'average_visit' => '187',
            'payment_due' => '2020-05-10',
            'tv_id' => 'tv008',
            'iot_id' => 'iot005',
            'android_box_id' => 'abd004',
        ],

    ];

    public function run()
    {
        foreach ($this->shops as $shop) {
            App\Models\Ddad\Shop::create($shop);
        }
    }
}
