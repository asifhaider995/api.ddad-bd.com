<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
function fakePersonName() {
    $prfix = ["Md", "Engineer", "Haji", "Doctor", "Hafez", "Alhaj"];
    $firstNames = ["Alauddin", "Nasir", "Sanjida", "Syful", "Shawon", "Maruf", "Jakir", "Kabir", "Masum", "Ajajul", "Sarmin", "Neamul", "Faruk", "Aziz", "Delowar", "Julekha"];
    $lastNames = ["Molla", "Khan", "Patuari", "Beperai", "Haque", "Kaji", "Mattubar", "Sikdar", "Master", "Munsi", "Chokdar"];

    return join(' ',
     array_filter([
         rand(0,4) == 1 ? $prfix[array_rand($prfix)] : null,
         $firstNames[array_rand($firstNames)],
         $lastNames[array_rand($lastNames)],
     ]));
}

function fakeCompanyName() {
    $firstNames = ["Link3", "Aamra", "Brac", "Antorango", "Race", "Earth", "Level3", "Bangla", "Information", "Aftab", "Orbit", "Neamul", "BD-Hub", "Agni"];
    $suffex = ["Technologies", "Online", "IT", "Limited", "Net", "Services", "Network"];

    return join(' ',
        array_filter([
            $firstNames[array_rand($firstNames)],
            $suffex[array_rand($suffex)],
        ]));
}

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Models\Ddad\Detector::class, function (Faker $faker) {
    return [
        'unique_id' => $faker->numerify('################'),
        'label' => $faker->lastName,
        'status' => rand(0,1)? 'active' : 'inactive',
    ];
});

$factory->define(\App\Models\Ddad\TV::class, function (Faker $faker) {
    return [
        'serial_number' => $faker->name,
        'size' => rand(0,1)? '32 inch' : '28 inch',
        'status' => rand(0,1)? 'active' : 'inactive',
    ];
});

$factory->define(\App\Models\Ddad\AndroidBox::class, function (Faker $faker) {
    return [
        'imei' => $faker->numerify('################'),
        'label' => $faker->lastName,
        'status' => rand(0,1)? 'active' : 'inactive',
    ];
});

$factory->define(\App\Models\Ddad\ISP::class, function (Faker $faker) {
    return [
        'contact_person' => fakePersonName(),
        'isp_name' => fakeCompanyName(),
        'mobile_number' => $faker->numerify('017########'),
        'package_name' => $faker->lastName,
        'package_price' => rand(500,2000),
    ];
});
