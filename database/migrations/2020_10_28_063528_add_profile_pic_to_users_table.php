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
            $table->string('profile_pic')->nullable();
            $table->bigInteger('contact')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('salary')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('added_by')->nullable();
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
