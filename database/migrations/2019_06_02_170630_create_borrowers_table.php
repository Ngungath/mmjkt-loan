<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_number')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('dob')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('comp_number')->nullable();
            $table->string('id_no')->nullable();
            $table->integer('unit_id')->default(1)->unsigned();
            $table->string('mob_number')->nullable();
            $table->string('hom_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('contract_status')->nullable();
            $table->string('salary_bank')->nullable();
            $table->string('bank_acc_number')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('applicant_photo')->nullable();
            $table->string('loan_type')->nullable();
            $table->string('monthly_basic_salary')->nullable();
            $table->string('monthly_net_salary')->nullable();
            $table->string('barack_name')->nullable();
            $table->string('barack_number')->nullable();
            $table->date('doe')->nullable();
            $table->date('rod')->nullable();
            $table->string('rank')->nullable();

            
            $table->enum('borrower_status',['Active','Inactive'])->default('Active');
            $table->timestamps();

            // foreign key
           
           $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}
