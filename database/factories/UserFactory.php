<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use App\hotelLists;
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

//password =$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('password'), // password
        'remember_token' => Str::random(10),
        'usertype' => $faker->randomElements($array = array ('staff','manager'), $count = 1)[0],
        'verification_code' => Str::random(10),
        'hotel_lists_id' => (hotelLists::select('id')->inRandomOrder()->first())->id,
        'added_by' =>1,
        'description' => $faker->paragraph,
        'profile_pic' => "http://loremflickr.com/200/200/cats/",
        'address' => $faker->address,
        'contact' => 7852460225,
        'salary' => $faker->numberBetween(15000,20000)

    ];
});
