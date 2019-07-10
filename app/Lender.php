<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    protected $filleble =['name','interest'];

    public function loan(){

    	return $this->hasMany('App\Loan');
    }
}
