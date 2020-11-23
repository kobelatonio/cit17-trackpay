<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTimeRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_time_records', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->time('shift_start');
            $table->time('shift_end');
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->integer('minutes_late')->nullable();
            $table->integer('hours_worked')->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('daily_time_records');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
