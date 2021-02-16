<?php

use Illuminate\Database\Seeder;

class QuestListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\questLists::class, 20)->create();
    }
}
