<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class AndroidBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Ddad\AndroidBox::class, 100)->create();
    }
}
