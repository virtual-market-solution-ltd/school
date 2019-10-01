<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyllabiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syllabus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->integer('classes_id')->unsigned();
            $table->foreign('classes_id')->references('id')->on('school_classes')->onDelete('cascade');
            $table->integer('exams_id')->unsigned();
            $table->foreign('exams_id')->references('id')->on('exams')->onDelete('cascade');
            $table->integer('subjects_id')->unsigned();
            $table->foreign('subjects_id')->references('id')->on('school_subjects')->onDelete('cascade');
            $table->text('description');
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
        Schema::dropIfExists('syllabus');
    }
}
