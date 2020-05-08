<?php

use Illuminate\Database\Seeder;

class ISPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Ddad\ISP::class, 20)->create();
    }
}
