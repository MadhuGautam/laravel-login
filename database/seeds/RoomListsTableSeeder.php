<?php

use Illuminate\Database\Seeder;

class RoomListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\roomLists::class, 20)->create();
    }
}
