<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

    	$users = User::paginate(3);
    	return view('users.index')->with('users',$users);

    }
}
