<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lender;

class LenderController extends Controller
{
    public function index()
    {
      return view('lender.index')->with('lenders',Lender::all());
    }

    public function store(Request $request){
    	$lender = new Lender;
    	$lender->name = $request->name;
    	$lender->save();
    	return response()->json(['success'=>"Lender Created successfully!"]);

    }

    public function destroy($id)
    {
      // $lender = Lender::find($id)->first;


        // if (!$contact->photo == NULL){
        //     unlink(public_path($contact->photo));
        // }

       Lender::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Lender successfully delete()d.'
        ]);
    }

}
