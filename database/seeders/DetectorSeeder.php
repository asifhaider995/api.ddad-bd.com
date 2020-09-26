<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DetectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Ddad\Detector::class, 100)->create();
    }
}
