<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Session;
use App\Lender;
use App\Loan;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $loans = Loan::where('borrower_id',$id)->get();
        return view('payments.create')->with('borrower_id',$id)
                                       ->with('lenders',Lender::all())
                                       ->with('loans',$loans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment;
        // $loan_payment = $request->all();

        // // check if payments of the same lander already exist
        // $check_payment = Payment::where('lender',$request->lender)
        //                       ->where('borrower_id',$request->borrower_id)
        //                       ->first();
        // if ($check_payment) {
            
        //     $available_amount = $check_payment['payement_amount'];
        //   //  dd($available_amount);
        // }else{

        //      $available_amount =0;
        // }

        //  $loan_payment['payement_amount'] = $available_amount + $request->payment_amount;
        //dd($loan_payment['payement_amount']);
         
        $originalpay_date = $request->repayment_date;
         $new_pay_date = strtotime($originalpay_date);
         $new_pay_date = date('Y-m-d');
         //check if the loan as already approved

         $loan = Loan::where('loan_number',$request->loan_number)->first();

         if($loan['loan_status'] == 'Pending'){
         
         Session::flash('warning','The Loan in not yet approved.');
        return redirect()->route('borrower.show',['id'=>$request->borrower_id]);
          
        }elseif($loan['loan_status'] == 'Declined'){

        Session::flash('warning','The Loan is declined.');
        return redirect()->route('borrower.show',['id'=>$request->borrower_id]);
        }else{

        //$loan_payment['payment_date'] = $new_pay_date ;
        $lender = explode('-', $request->loan_number); 


        $lender_id =Lender::where('name',$lender[1])->first();
        //dd($lender_id->id);
         
        $payment->borrower_id = $request->borrower_id;
        $payment->lender_id = $lender_id->id;
        $payment->loan_number = $request->loan_number;
        $payment->loan_id = $loan->id;
        $payment->payment_date = $new_pay_date;
        $payment->payement_amount = $request->payment_amount;
        $payment->save();
        // $payment = Payment::where('borrower_id',$request->borrower_id)
        // ->where('lender',$request->lender)
        // ->update(['payement_amount'=>$loan_payment['payement_amount'],'payment_date'=>$loan_payment['payment_date']]);

        Session::flash('success','Payment successfully Deposited');
        return redirect()->route('borrower.show',['id'=>$request->borrower_id]);


        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
