<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTaxSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_tax_setup', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->integer('st_amount');
            $table->integer('end_amount');
            $table->integer('rate');
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
        Schema::dropIfExists('hr_tax_setup');
    }
}
