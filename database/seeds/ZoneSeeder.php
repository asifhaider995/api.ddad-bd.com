<?php

use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{

    protected $zones = [
        [
            'name' => 'zone a',
            'description' => 'Lalmatia, Kolabagan, Dhanmondi ',
        ],
        [
            'name' => 'zone b',
            'description' => 'Paltan, Motijheel, Bijoynagar',
        ],
        [
            'name' => 'zone c',
            'description' => 'Mohakhali, Bannani, Gulshan',
        ],


    ];

    public function run()
    {
        foreach ($this->zones as $zone) {
            App\Models\Ddad\Zone::create($zone);
        }
    }
}
