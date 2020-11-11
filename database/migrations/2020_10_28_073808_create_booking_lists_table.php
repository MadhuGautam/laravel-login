<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_lists', function (Blueprint $table) {
            $table->id();
            $table->string('booking_name');
            $table->bigInteger('room_lists_id');
            $table->bigInteger('hotel_lists_id');
            $table->bigInteger('room_price');
            $table->bigInteger('Booking_num_of_days');
            $table->dateTime('Booking_date_from');
            $table->dateTime('Booking_date_to');
            $table->bigInteger('room_price_per_day');
            $table->bigInteger('discount_amount');
            $table->bigInteger('charged_booking_amount');
            $table->string('booking_status');
            $table->bigInteger('Total_room_amount');
            $table->bigInteger('Total_paid_amount');
            $table->string('Payment_mode');
            $table->string('description');
            $table->bigInteger('added_by');
            $table->bigInteger('booking_from');
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
        Schema::dropIfExists('booking_lists');
    }
}
