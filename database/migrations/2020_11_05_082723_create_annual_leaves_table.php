<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('annual_leaves', function (Blueprint $table) {
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('leave_category_id')->constrained('leave_categories');
            $table->decimal('leave_days_spent', 10, 3);
            $table->decimal('leave_days_left', 10 , 3);
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
        Schema::dropIfExists('annual_leaves');
    }
}
