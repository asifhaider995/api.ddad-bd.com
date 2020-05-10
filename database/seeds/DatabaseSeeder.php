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
        $this->call(RolePermissionSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(AndroidBoxSeeder::class);
        $this->call(DetectorSeeder::class);
        $this->call(ISPSeeder::class);
        $this->call(TVSeeder::class);
    }
}
