<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrMaritalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_marital', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->string('status');
            $table->integer('inactive');
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
        Schema::dropIfExists('hr_marital');
    }
}
