<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ISPSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Ddad\ISP::class, 11)->create();
    }
}
