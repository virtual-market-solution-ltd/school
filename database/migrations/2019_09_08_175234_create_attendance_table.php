<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('attendance_date');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->integer('school_classes_id')->unsigned();
            $table->foreign('school_classes_id')->references('id')->on('school_classes')->onDelete('cascade');
            $table->integer('school_sections_id')->unsigned();
            $table->foreign('school_sections_id')->references('id')->on('school_sections')->onDelete('cascade');
            $table->integer('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('taken_by')->unsigned();
            $table->foreign('taken_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('attendance_status');
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
        Schema::dropIfExists('attendance');
    }
}
