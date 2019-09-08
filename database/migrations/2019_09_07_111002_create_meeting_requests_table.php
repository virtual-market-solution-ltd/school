<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');

            $table->integer('teachers_id')->unsigned();
            $table->foreign('teachers_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('start_time');
            $table->string('end_time');

            $table->string('date');
            $table->integer('status');
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
        Schema::dropIfExists('meeting_requests');
    }
}
