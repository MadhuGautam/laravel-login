<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCatListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_cat_lists', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name');
            $table->bigInteger('cat_price');
            $table->bigInteger('discount');
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
        Schema::dropIfExists('room_cat_lists');
    }
}
