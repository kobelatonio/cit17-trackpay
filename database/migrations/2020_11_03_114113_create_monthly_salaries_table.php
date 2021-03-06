<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlySalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_salaries', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->decimal('gross_pay', 10, 2);
            $table->decimal('total_deductibles', 10, 2);
            $table->decimal('first_cutoff_pay', 10, 2);
            $table->decimal('second_cutoff_pay', 10, 2);
            $table->decimal('net_pay', 10, 2);
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
        Schema::dropIfExists('monthly_salaries');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
