<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');

            $table->integer('teachers_id')->unsigned();
            $table->foreign('teachers_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('school_classes_id')->unsigned();
            $table->foreign('school_classes_id')->references('id')->on('school_classes')->onDelete('cascade');

            $table->integer('school_sections_id')->unsigned();
            $table->foreign('school_sections_id')->references('id')->on('school_sections')->onDelete('cascade');

            $table->integer('school_subjects_id')->unsigned();
            $table->foreign('school_subjects_id')->references('id')->on('school_subjects')->onDelete('cascade');

            $table->integer('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name');
            $table->string('deadline');
            $table->text('description');
            $table->text('file_location');
            
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
        Schema::dropIfExists('homeworks');
    }
}
