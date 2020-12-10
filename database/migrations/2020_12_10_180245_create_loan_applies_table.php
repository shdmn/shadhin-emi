<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applies', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->decimal('amount',10,2);
            $table->integer('duration');
            $table->decimal('rate',10,2);
            $table->integer('status')->default(0);
            $table->decimal('emi',10,2)->nullable();

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
        Schema::dropIfExists('loan_applies');
    }
}
