<?php

use Illuminate\Database\Seeder;

class BookingListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\bookingLists::class, 20)->create();
    }
}
