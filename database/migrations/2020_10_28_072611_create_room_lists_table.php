<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_lists', function (Blueprint $table) {
            $table->id();
            $table->string('Room_ID');
            $table->bigInteger('room_cat');
            $table->bigInteger('hotel_id');
            $table->bigInteger('room_availability_status');
            $table->bigInteger('added_by');
            $table->string('description');
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
        Schema::dropIfExists('room_lists');
    }
}
