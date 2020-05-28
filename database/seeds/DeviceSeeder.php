<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    public function run()
    {
       factory(\App\Models\Ddad\Device::class, 20)->create();
    }
}
