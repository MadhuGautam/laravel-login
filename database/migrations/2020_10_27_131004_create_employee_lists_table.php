<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_lists', function (Blueprint $table) {
            $table->id();
            $table->string('emp_ID');
            $table->string('emp_name');
            $table->string('emp_profile_pic');
            $table->string('emp_email');
            $table->string('emp_contact');
            $table->string('emp_role');
            $table->string('emp_address');
            $table->string('emp_salary');
            $table->foreignId('assigned_hotel_id')->constrained('hotel_lists');
            $table->string('description');
            $table->string('added_by');
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
        Schema::dropIfExists('employee_lists');
    }
}
