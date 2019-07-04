<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    protected $filleble =['name'];

    public function loan(){

    	return $this->hasMany('App\Loan');
    }
}
