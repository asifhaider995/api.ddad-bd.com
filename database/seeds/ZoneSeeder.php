<?php

use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{

    protected $zones = [
        [
            'name' => 'Zone A',
            'description' => 'Lalmatia, Kolabagan, Dhanmondi ',
        ],
        [
            'name' => 'Zone B',
            'description' => 'Paltan, Motijheel, Bijoynagar',
        ],
        [
            'name' => 'Zone C',
            'description' => 'Mohakhali, Bannani, Gulshan',
        ],
    ];

    public function run()
    {
        foreach ($this->zones as $zoneData) {
            $zone = App\Models\Ddad\Zone::create(['name'  => $zoneData['name']]);
            $locationData = explode(',', $zoneData['description']);
            $locations = [];
            foreach($locationData as $locationName)
            {
                $locations[] = new \App\Models\Location(['name' => $locationName]);
            }
            $zone->locations()->saveMany($locations);
        }
    }
}
