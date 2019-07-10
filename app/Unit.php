<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
       'name','number'

    ];

    public function borrowers(){
    	return $this->hasMany('App\Borrower');
    }
}
