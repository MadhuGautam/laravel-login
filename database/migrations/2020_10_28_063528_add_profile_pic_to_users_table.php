<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePicToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('profile_pic');
            $table->bigInteger('contact');
            $table->string('address');
            $table->bigInteger('salary');
            $table->string('description');
            $table->bigInteger('added_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_pic');
            $table->dropColumn('contact');
            $table->dropColumn('address');
            $table->dropColumn('salary');
            $table->dropColumn('description');
            $table->dropColumn('added_by');

        });
    }
}
