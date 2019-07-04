<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
   protected $fillable =[
    'borrower_id','loan_number','loan_purpose','loan_type','loan_amount',
    'lender','application_date','repaymaent_period'
   ];

    public function borrower(){

    	return $this->belongsTo('App\Borrower');
    }

    public function payments(){
    	return $this->hasMany('App\payment');
    }

    public function lender(){
        return $this->belongsTo('App\Lender');
    }
}
