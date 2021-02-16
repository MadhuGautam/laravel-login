<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
       // $this->cleanDatabase();
        //DB::statement('SET FOREIGN_KEY_CHECKS = "0"');
        $this->call([
        HotelListsTableSeeder::class,
        UsersTableSeeder::class,
        RoomListsTableSeeder::class,
        BookingListsTableSeeder::class,
        QuestListsTableSeeder::class,

        ]);
       // DB::statement('SET FOREIGN_KEY_CHECKS = "1"');
    }

    public function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS="0";');
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS="1";');
    }
}
