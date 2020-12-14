<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\roomLists;
use Faker\Generator as Faker;

$factory->define(roomLists::class, function (Faker $faker) {
    // $faker->addProvider(new Xvladqt\Faker\LoremFlickrProvider($faker));
    return [
        'room_cat' => $faker->randomElements($array = array ('economy','luxury'), $count = 1)[0],
        //'beds' => $faker->numberBetween(1,4),
        // 'facilities' => $faker->words($nb = 3, $asText = false),
        // 'image' => "http://loremflickr.com/640/480/cats/",
       // 'image' => "https://loremflickr.com/640/480/hotels,rooms?random=".$faker->numberBetween($min = 1, $max = 50),
        'room_price' => $faker->numberBetween(10000,20000),
        'description' => $faker->paragraph,
       // 'capacity' => $faker->numberBetween(1,6),
        'room_availability_status' => $faker->boolean($chanceOfGettingTrue = 50),
        'hotel_lists_id' => factory(App\hotelLists::class),
        'added_by' =>1,
        // 'hotel_id' => 1
    ];
});
