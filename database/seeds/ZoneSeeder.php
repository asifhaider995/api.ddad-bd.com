<?php

use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{

    protected $zones = [
        [
            'name' => 'a',
            'description' => 'zone a',
        ],
        [
            'name' => 'b',
            'description' => 'zone b',
        ],
        [
            'name' => 'c',
            'description' => 'zone c',
        ],


    ];

    public function run()
    {
        foreach ($this->zones as $zone) {
            App\Models\Ddad\Zone::create($zone);
        }
    }
}
