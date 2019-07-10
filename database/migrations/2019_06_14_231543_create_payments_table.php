<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('borrower_id')->unsigned();
            $table->integer('lender_id')->unsigned();
            $table->string('loan_number')->nullable();
            $table->integer('loan_id')->unsigned();
            $table->string('payment_year')->nullable();
            $table->string('payment_month')->nullable();
            $table->double('payement_amount',20,2)->default(0.00);
            $table->timestamps();
            $table->foreign('borrower_id')->references('id')->on('borrowers');
            //$table->foreign('lender_id')->references('id')->on('lenders');
           $table->foreign('loan_id')->references('id')->on('loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
