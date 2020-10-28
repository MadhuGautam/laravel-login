<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quest_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id');
            $table->string('quest_name');
            $table->string('quest_image');
            $table->string('quest_from');
            $table->bigInteger('quest_contact');
            $table->string('purpose');
            $table->bigInteger('num_of_person');
            $table->bigInteger('num_of_docs_submit');
            $table->string('aadhar_card_url');
            $table->string('licence_card_url');
            $table->string('voter_card_url');
            $table->string('other_docs_url');
            $table->dateTime('checkin_datetime');
            $table->dateTime('checkout_datetime');
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
        Schema::dropIfExists('quest_lists');
    }
}
