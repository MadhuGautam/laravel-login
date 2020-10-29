<?php

use Illuminate\Database\Seeder;

class HotelListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\hotelLists::class, 20)->create();
    }
}
