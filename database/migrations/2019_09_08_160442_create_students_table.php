<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->integer('school_classes_id')->unsigned();
            $table->foreign('school_classes_id')->references('id')->on('school_classes')->onDelete('cascade');
            $table->integer('school_sections_id')->unsigned();
            $table->foreign('school_sections_id')->references('id')->on('school_sections')->onDelete('cascade');

            $table->string('roll_number');
            $table->string('phone_number');
            $table->string('blood_group');
            $table->string('applicant_id');
            $table->string('email');
            $table->string('photo');
            $table->text('present_address');
            $table->text('permanent_address');
            
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
        Schema::dropIfExists('students');
    }
}
