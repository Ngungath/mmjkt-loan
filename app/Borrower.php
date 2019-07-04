<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
		public function setEntryDateAttribute($input)
		{
		    $this->attributes['entry_date'] = 
		      Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
		}
    protected $fillable =[
     'loan_number','fname','mname','lname','dob','place_birth','comp_number','id_number',
     'mob_number','hom_number','gender','contract_status','salary_bank','bank_acc_number',
     'bank_branch','loan_type','barack_name','barack_number','doe','rod','rank','monthly_basic_salary','monthly_net_salary'
  
    ];

    public function loans(){
    	return $this->hasMany('App\Loan');
    }
}
