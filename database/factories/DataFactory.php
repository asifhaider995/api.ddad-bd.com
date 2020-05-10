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
    $firstNames = ["Alauddin", "Nasir", "Sanjida", "Syful", "Shawon", "Maruf", "Jakir", "Kabir", "Masum", "Ajajul", "Sarmin", "Neamul", "Faruk", "Aziz", "Delowar", "Julekha", "Madaripur", "Faridpur", "Dhaka", "Noakhali", "Bosila", "Molla", "Khan", "Patuari", "Beperai", "Haque", "Kaji", "Mattubar", "Sikdar", "Master", "Munsi", "Chokdar"];
    $suffex = ["Traders", "Enterprise", "Library", "Corporation", "Ltd", "International"];

    return join(' ',
        array_filter([
            $firstNames[array_rand($firstNames)],
            $suffex[array_rand($suffex)],
        ]));
}

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'dob' => $faker->date(),
        'gender' => rand(0,1)? 'male' : 'female',
        'mobile_number' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Models\Ddad\Detector::class, function (Faker $faker) {
    return [
        'unique_id' => $faker->numerify('################'),
        'label' => $faker->numerify('iot####'),
        'status' => rand(0,1)? 'active' : 'inactive',
    ];
});

$factory->define(\App\Models\Ddad\TV::class, function (Faker $faker) {
    return [
        'serial_number' => $faker->numerify('tv######'),
        'size' => rand(0,1)? '32 inch' : '28 inch',
        'status' => rand(0,1)? 'active' : 'inactive',
    ];
});

$factory->define(\App\Models\Ddad\AndroidBox::class, function (Faker $faker) {
    return [
        'imei' => $faker->numerify('################'),
        'label' => $faker->numerify('adb####'),
        'status' => rand(0,1)? 'active' : 'inactive',
    ];
});

$factory->define(\App\Models\Ddad\ISP::class, function (Faker $faker) {
    static $count = 0;
    $names = [
        'aamra Networks Ltd',
        'Aftab IT Ltd.',
        'Amber IT Limited',
        'Carnival Internet',
        'DOT Internet',
        'Information Services Network Limited',
        'KS Network Ltd',
        'Link3 Technologies Ltd',
        'MetroNet Bangladesh Limited',
        'Smile Broadband',
        'Triangle Services Limited',
    ];
    return [
        'name' => $names[$count++],
        'contact_person' => fakePersonName(),
        'mobile_number' => $faker->numerify('017########'),
        'package_name' => 'Package1',
        'package_price' => rand(500,2000),
    ];
});

$factory->define(\App\Models\Ddad\Shop::class, function (Faker $faker){
    return [
        'name' => fakeCompanyName(),
        'address' => $faker->address,
        'owner_name' => fakePersonName(),
        'owner_nid' => $faker->numerify('##########'),
        'kcp_name' => fakePersonName(),
        'kcp_mobile_number' => $faker->numerify('017########'),
        'payment_per_ad' => rand(300, 500),
        'average_visit' => rand(200, 300),
        'status' => rand(0,1)? 'active' : 'inactive',
        'payment_due_date' => $faker->date(),
        'zone_id' => rand(1, 3),
        'detector_id' => rand(1, 10),
        'tv_id' => rand(1, 10),
        'android_box_id' => rand(1, 10),
        'isp_id' => rand(1, 10),
    ];
});
