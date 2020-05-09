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
        $user = new \App\Models\User();
        $user->name = "Shahadat";
        $user->email = "admin@example.com";
        $user->password = bcrypt('Test1234');
        $user->save();


        $this->call(DeviceSeeder::class);
        $this->call(ShopSeeder::class);

        $this->command->info("Login: admin@example.com/test1234");
    }
}
