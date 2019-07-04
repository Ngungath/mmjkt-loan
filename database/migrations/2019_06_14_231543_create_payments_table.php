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
            $table->string('lender_id')->unsigned()->default(1);
            $table->string('loan_number')->nullable();
            $table->integer('loan_id')->unsigned();
            $table->date('payment_date');
            $table->double('payement_amount',15,8)->default(0.00);
            $table->timestamps();
            $table->foreign('lender_id')->references('id')->on('lender');
            $table->foreign('loan_id')->references('id')->on('loan');
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
