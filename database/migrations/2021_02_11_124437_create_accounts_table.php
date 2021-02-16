<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_lists_id');
            $table->bigInteger('quest_lists_id');
            $table->bigInteger('room_lists_id');
            $table->bigInteger('hotel_lists_id');
            $table->bigInteger('total_room_amount');
            $table->bigInteger('paid_amount');
            $table->bigInteger('pending_amount');
            $table->bigInteger('total_paid_amount');
            $table->string('status');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
