<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->integer('school_classes_id')->unsigned();
            $table->foreign('school_classes_id')->references('id')->on('school_classes')->onDelete('cascade');
            $table->integer('school_sections_id')->unsigned();
            $table->foreign('school_sections_id')->references('id')->on('school_sections')->onDelete('cascade');
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
        Schema::table('school_subjects', function (Blueprint $table) {
            $table->dropForeign('schools_subjects_schools_id_foreign');
            $table->dropForeign('schools_subjects_school_classes_id_foreign');
            $table->dropForeign('schools_subjects_school_sections_id_foreign');
        });
    }
}
