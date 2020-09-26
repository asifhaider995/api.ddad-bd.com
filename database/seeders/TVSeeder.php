<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class TVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Ddad\TV::class, 100)->create();
    }
}
