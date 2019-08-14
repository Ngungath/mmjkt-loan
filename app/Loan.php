<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    //

    use SoftDeletes;
   protected $fillable =[
    'borrower_id','loan_number','loan_purpose','loan_type','loan_amount',
    'lender','application_date','repaymaent_period'
   ];

   protected $dates = ['deleted_at'];

    public function borrower(){

    	return $this->belongsTo('App\Borrower','borrower_id');
    }

    public function payments(){
    	return $this->hasMany('App\payment');
    }

    public function lender(){
        return $this->belongsTo('App\Lender');
    }
}
