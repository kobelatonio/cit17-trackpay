<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductibleRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deductible_records', function (Blueprint $table) {
            $table->date('date');
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('deductible_id')->constrained('deductibles');
            $table->boolean('is_deducted');
            $table->decimal('deduction_amount', 10, 2);
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
        Schema::dropIfExists('deductible_records');
    }
}
