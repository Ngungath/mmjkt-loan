<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lender;
use Session;

class LenderController extends Controller
{
    public function index()
    {
      return view('lender.index')->with('lenders',Lender::paginate(10));
    }

    public function create(){

        return view('lender.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'interest'=>'required'
        ]);
    	$lender = new Lender;
    	$lender->name = $request->name;
        $lender->interest = $request->interest;
    	$lender->save();
        Session::flash('success',"Lender Created successfully!");
    	return redirect()->route('lender');

    }

    public function edit($id){
        return view('lender.edit')->with('lender',Lender::find($id));
    }

    public function update(Request $request,$id){

         $this->validate($request,[
            'name'=>'required',
            'interest'=>'required'
        ]);
        $lender = Lender::find($id);
        $lender->name = $request->name;
        $lender->interest = $request->interest;
        $lender->update();
        Session::flash('success','Lender successfully updated');
        return redirect()->route('lender');

    }

    public function destroy($id)
    {
      $lender = Lender::find($id);
      $lender->delete();
      Session::flash('success','Lender successfully deleted');
      return redirect()->route('lender');
    }

}
