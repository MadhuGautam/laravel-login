<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\questLists;
use App\User;
use App\bookingLists;
use Faker\Generator as Faker;

$factory->define(questLists::class, function (Faker $faker) {
    $booking = bookingLists::select('id','Booking_date_from','Booking_date_to')->inRandomOrder()->first();
    return [
        'quest_name' =>$faker->name,
        'quest_image' =>"http://loremflickr.com/200/200/cats/",
        'quest_from' =>$faker->address,
        'quest_contact' =>$faker->e164PhoneNumber,
        'purpose' =>$faker->randomElements($array = array ('Family vacation','Honeymoon', 'Business'), $count = 1)[0],
        'num_of_person' =>$faker->numberBetween(1,5),
        'num_of_docs_submit' =>$faker->numberBetween(1,6),
        'aadhar_card_url' =>"http://loremflickr.com/200/200/cats/",
        'licence_card_url' =>"http://loremflickr.com/200/200/cats/",
        'voter_card_url' =>"http://loremflickr.com/200/200/cats/",
        'other_docs_url' =>"http://loremflickr.com/200/200/cats/",
        'checkin_datetime' =>$booking->Booking_date_from,
        'checkout_datetime' =>$booking->Booking_date_to,
        'added_by' =>(User::select('id')->where('usertype','admin')->orWhere('usertype','manager')->inRandomOrder()->first())->id,
        'description' =>$faker->paragraph,
        'booking_lists_id' =>$booking->id,
    ];
});
