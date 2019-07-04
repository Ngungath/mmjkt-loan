<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'borrower_id','lender','repayment_date','payment_amount'
    ];

    public function Loan()
    {
    	return $this->belongsTo('App\Loan');
    }
}
