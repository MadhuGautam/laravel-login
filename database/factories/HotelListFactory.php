<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\hotelLists;
use Faker\Generator as Faker;

$factory->define(hotelLists::class, function (Faker $faker) {
    return [
        'hotel_name' => $faker->company,
        'hotel_email' => $faker->unique()->safeEmail,
        'hotel_owner' => $faker->company,
        'description' => $faker->paragraph,
        'no_of_rooms' => $faker->numberBetween(50,200),
        'added_by' =>1,
        //'phone' => $faker->phoneNumber,
        'hotel_location' => $faker->address,
        'hotel_image' => "https://loremflickr.com/640/480/hotels,buildings?random=".$faker->numberBetween($min = 1, $max = 50),
        // 'longitude' => $faker->longitude($min = 74.4001, $max = 74.2277),
        // 'latitude' => $faker->latitude($min = 31.4148, $max = 31.5743)
    ];
});
