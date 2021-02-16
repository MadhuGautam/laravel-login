<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\roomLists;
use App\hotelLists;
use App\User;
use Faker\Generator as Faker;

$factory->define(roomLists::class, function (Faker $faker) {
    // $faker->addProvider(new Xvladqt\Faker\LoremFlickrProvider($faker));
    return [
        'room_cat' => $faker->randomElements($array = array ('economy','luxury'), $count = 1)[0],
        'room_name' => $faker->randomElements($array = array ('F','S','T','FO','FV'), $count = 1)[0].$faker->numberBetween(1,20),
        'room_price' => $faker->numberBetween(10000,20000),
        'description' => $faker->paragraph,
        'room_availability_status' => $faker->boolean($chanceOfGettingTrue = 50),
        'hotel_lists_id' => (hotelLists::select('id')->inRandomOrder()->first())->id,
        'added_by' =>(User::select('id')->where('usertype','admin')->orWhere('usertype','manager')->inRandomOrder()->first())->id

    ];
});
