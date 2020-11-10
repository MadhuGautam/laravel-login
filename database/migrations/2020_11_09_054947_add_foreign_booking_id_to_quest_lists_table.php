<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignBookingIdToQuestListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quest_lists', function (Blueprint $table) {
            $table->bigInteger('booking_lists_id')->unsigned()->nullable()->after('id');
            $table->foreign('booking_lists_id')->references('id')->on('booking_lists')->onDelete('SET NULL');
            $table->dropColumn('booking_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quest_lists', function (Blueprint $table) {
            $table->dropForeign(['booking_lists_id']);
            $table->dropColumn('booking_lists_id');
            $table->bigInteger('booking_id');
        });
    }
}
