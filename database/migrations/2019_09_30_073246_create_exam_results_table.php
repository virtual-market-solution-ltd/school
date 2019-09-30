<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->integer('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('classes_id')->unsigned();
            $table->foreign('classes_id')->references('id')->on('school_classes')->onDelete('cascade');
            $table->integer('sections_id')->unsigned();
            $table->foreign('sections_id')->references('id')->on('school_sections')->onDelete('cascade');
            $table->integer('subjects_id')->unsigned();
            $table->foreign('subjects_id')->references('id')->on('school_subjects')->onDelete('cascade');
            $table->integer('exams_id')->unsigned();
            $table->foreign('exams_id')->references('id')->on('exams')->onDelete('cascade');
            $table->integer('obtained_mark')->unsigned();
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
        Schema::dropIfExists('exam_results');
    }
}
