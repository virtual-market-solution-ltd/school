<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_department', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->integer('account_type')->unsigned();
            $table->foreign('account_type')->references('id')->on('chart_types')->onDelete('cascade');
            $table->string('deptname');
            $table->string('dept_position');
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
        Schema::dropIfExists('hr_department');
    }
}
