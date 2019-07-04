<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(1);
            $table->string('loan_number')->unique();
            $table->string('loan_purpose')->nullable();
            $table->enum('loan_type',['New','Top Up'])->default('New');
            $table->double('loan_amount',15,8)->default(0.00);
            $table->integer('lender_id')->unsigned();
            $table->integer('borrower_id')->unsigned();
            $table->string('application_year')->nullable();
             $table->string('application_month')->nullable();
            $table->enum('loan_status',['Pending','Approved','Declined','open',
                'fully_paid','Suspended'])->default('Pending');
            $table->integer('repayment_period')->nullable();
             $table->enum('loan_repayment_type',[
                'day',
                'week',
                'month',
                'year'
            ])->default('month');
           
            $table->timestamps();
            //Foregn keys
            //$table->foreign('lender_id')->references('id')->on('lenders');
            $table->foreign('borrower_id')->references('id')->on('borrowers');
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
