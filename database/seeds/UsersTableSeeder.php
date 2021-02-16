<?php

use Illuminate\Database\Seeder;
use App\User;
use App\hotelLists;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        User::create([
            'name' => 'admin',
            'email' => 'madhu.mitta@franticsolution.net',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'usertype' =>  'admin',
            'verification_code' => Str::random(10),
            'hotel_lists_id' => (hotelLists::select('id')->inRandomOrder()->first())->id,
            'added_by' =>0,
            'description' => "Admin Profile",
            'profile_pic' => "http://loremflickr.com/200/200/cats/",
            'address' => 'CHD',
            'contact' => 7824605575,
            'salary' => 100000
        ]);

        factory(App\User::class, 20)->create();
    }
}
