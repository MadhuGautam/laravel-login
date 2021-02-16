<?php

use Illuminate\Database\Seeder;
use App\hotelLists;

class HotelListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        hotelLists::create([
            'hotel_name' => "TAJ",
            'hotel_email' => "support@taj.com",
            'hotel_owner' => "TAJ",
            'description' => "description",
            'no_of_rooms' => 0,
            'added_by' =>1,
            'hotel_location' => "Chd",
            'hotel_image' => "https://loremflickr.com/640/480/hotels,buildings?random=11",
        ]);

        factory(App\hotelLists::class, 20)->create();
    }
}
