<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class UsersController extends Controller
{
    public function index(){

    	$users = User::paginate(3);
    	return view('users.index')->with('users',$users);

    }

    public function create(){
    	return view('users.create');
    }
    public function store(Request $request){
        $this->validate($request,[
             'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
         ]);
    	 User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type'=>$request->user_type,
            'password' => Hash::make($request->password),
        ]);

    	 Session::flash('success','User Created Successfully');
         return redirect()->route('users');

    }

    public function edit($id){

    	return view('users.edit')->with('user',User::find($id));
    }

    public function update(Request $request, $id){
      
      $this->validate($request,[
             'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
         ]);
    	 User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_type'=>$request->user_type,
            'password' => Hash::make($request->password),
        ]);

    	 Session::flash('success','User Updated Successfully');
         return redirect()->route('users');
    	
    }

    public function destroy($id){

    	$user = User::find($id);
    	$user->delete();
    	Session::flash('success','User Successfully Deleted');
        return redirect()->route('users');
    }

}
