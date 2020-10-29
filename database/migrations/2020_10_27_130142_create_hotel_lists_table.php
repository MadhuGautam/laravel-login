<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_lists', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->string('hotel_image');
            $table->string('hotel_location');
            $table->string('hotel_email');
            $table->string('hotel_owner');
            $table->bigInteger('no_of_rooms')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('added_by');
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
        Schema::dropIfExists('hotel_lists');
    }
}
