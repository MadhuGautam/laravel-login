<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\bookingLists;
use Faker\Generator as Faker;

$factory->define(bookingLists::class, function (Faker $faker) {
    return [
        //
        'booking_name'=>$faker->name,
        'room_lists_id'=>'1',
        'hotel_lists_id'=>'1',
        'room_price'=>$faker->numberBetween(10000,20000),
        'Booking_num_of_days'=>'2',
        'Booking_date_from'=>'11-01-2021',
        'Booking_date_to'=>'12-01-2021',
        'room_price_per_day'=>'1000',
        'discount_amount'=>'200',
        'charged_booking_amount'=>'200',
        'booking_status'=>'1',
        'Total_room_amount'=>'2000',
        'Total_paid_amount'=>'600',
        'Payment_mode'=>'cash',
        'description'=>'room booked',
        'added_by'=>'1',

        'booking_from'=>'qwerty',
    ];
});
