<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(User::class, 1)->make()->first();
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('Test1234');
        $admin->save();
//        $admin->assignRole('admin');

    }
}
