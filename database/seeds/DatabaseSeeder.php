<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ZoneSeeder::class);
    }
}
