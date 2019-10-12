<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrAttendanceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_attendance_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schools_id')->unsigned();
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->string('csv_id');
            $table->string('emp_code');
            $table->string('login_date');
            $table->string('login_time');
            $table->string('lunch_time');
            $table->string('logout_date');
            $table->string('logout_time');
            $table->string('actual_logout_time');
            $table->string('total_time');
            $table->string('total_office_time');
            $table->string('ot');
            $table->string('extra_ot');
            $table->string('night_ot');
            $table->string('status');
            $table->string('abs_status');
            $table->string('late_status');
            $table->string('tiffin_bill');
            $table->string('is_logged_in');
            $table->string('is_edited');
            $table->string('att_year');
            $table->string('att_reason');
            $table->string('manual_entry_by');
            $table->string('manual_entry_date');
            $table->string('last_modify_by');
            $table->string('last_modify_date');
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
        Schema::dropIfExists('hr_attendance_details');
    }
}
