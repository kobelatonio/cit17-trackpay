<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTimeRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_time_record', function (Blueprint $table) {
            $table->date('date');
            $table->primary('date');
            $table->foreignId('employee_id')->constrained('employees');
            $table->time('shift_start');
            $table->time('shift_end');
            $table->time('time_in');
            $table->time('time_out');
            $table->integer('minutes_late');
            $table->integer('hours_worked');
            $table->string('remarks');
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
        Schema::dropIfExists('daily_time_record');
    }
}
