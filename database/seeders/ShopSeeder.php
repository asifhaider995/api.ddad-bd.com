<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Ddad\Shop::class, 20)->create();
    }
}
