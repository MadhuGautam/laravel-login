<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\bookingLists;
use App\roomLists;
use App\User;
use Faker\Generator as Faker;

$factory->define(bookingLists::class, function (Faker $faker) {
    $room_data = roomLists::select('id','hotel_lists_id','room_price')->inRandomOrder()->first();
    $stop_date = '2020-06-30 20:24:00';
    $days = ' +'.rand(10,100).' day';
    $bookingfrom_date = date('Y-m-d H:i:s', strtotime($stop_date . $days));
    $bookingdays = rand(2,5);
    $bookdays = ' +'.$bookingdays.' day';
    $bookingto_date = date('Y-m-d H:i:s', strtotime($bookingfrom_date . $bookdays));

    return [
        //
        'booking_name'=>$faker->name,
        'room_lists_id'=>$room_data->id,
        'hotel_lists_id'=>$room_data->hotel_lists_id,
        'room_price'=>$faker->numberBetween(10000,20000),
        'Booking_num_of_days'=>$bookingdays,
        'Booking_date_from'=>$bookingfrom_date,
        'Booking_date_to'=>$bookingto_date,
        'room_price_per_day'=>$room_data->room_price,
        'discount_amount'=>$faker->numberBetween(100,500),
        'charged_booking_amount'=>$faker->numberBetween(500,1000),
        'booking_status'=>$faker->randomElements($array = array ('Confirmed','Cancelled'), $count = 1)[0],
        'Total_room_amount'=>($room_data->room_price * $bookingdays),
        'Total_paid_amount'=>$faker->numberBetween(1500,2000),
        'Payment_mode'=>$faker->randomElements($array = array ('Cash','Credit Card', 'Debit Card'), $count = 1)[0],
        'description'=>$faker->paragraph,
        'added_by'=>(User::select('id')->where('usertype','admin')->orWhere('usertype','manager')->inRandomOrder()->first())->id,
        'booking_from'=>$faker->randomElements($array = array ('MakeMyTrip','Goibibo', 'Direct'), $count = 1)[0],
    ];
});
