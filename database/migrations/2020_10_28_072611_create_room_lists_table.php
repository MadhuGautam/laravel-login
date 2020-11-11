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
            $table->string('room_cat');
            $table->bigInteger('hotel_lists_id')->unsigned()->nullable();
            $table->foreign('hotel_lists_id')->references('id')->on('hotel_lists')->onDelete('SET NULL');
            $table->boolean('room_availability_status');
            $table->bigInteger('room_price');
            $table->bigInteger('added_by');
            $table->string('description')->nullable();
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
