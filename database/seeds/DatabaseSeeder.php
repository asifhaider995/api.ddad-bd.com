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
        $user = new \App\Models\User();
        $user->name = "Shahadat";
        $user->email = "admin@example.com";
        $user->password = bcrypt('Test1234');
        $user->save();


        $this->call(DeviceSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(AndroidBoxSeeder::class);
        $this->call(DetectorSeeder::class);
        $this->call(ISPSeeder::class);
        $this->call(TVSeeder::class);
    }
}
