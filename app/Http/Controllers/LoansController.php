<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use Carbon\Carbon;
use App\Payment;
use App\Lender;
use App\Loan;
use Session;
use DB;


class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $borrowers = Borrower::where('deleted_at', NULL)->get();
        $loans = Loan::where('active',1)->paginate(10);
        return view('loans.index')->with('loans',$loans)
                                ->with('borrowers',$borrowers);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
       // dd($id);
        $borrower = Borrower::find($id);
        return view('loans.create')->with('borrower',$borrower)
                                   ->with('lenders',Lender::all()); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create Loan unique number
         $last_id = Loan::all()->last() ;

         if(!isset($last_id)){
            $id = 0;
            $last_inserted_id =$id + 1;
            $inserted_id = $last_inserted_id;

         }else{

            $last_inserted_id = Loan::all()->last()->id;

            $inserted_id = $last_inserted_id + 1;


         }
         
         // check if the borrower has a privious new loan application

         $loan_check = Loan::where('borrower_id',$request->borrower_id)
                       ->where('lender_id',$request->lender_id)
                       ->where('loan_type','New')->first();

         if (isset($loan_check) && $request->loan_type == "New") {
         Session::flash('warning','Borrower has already have NEW loan on the same lender ,please select Top Up to Proceed');
        return redirect()->route('loans.create',['id'=>$request->borrower_id])->withInput();
            
         }else{


         $id_no = $request->id_no;
       
         $lender = Lender::find($request->lender_id);
         $loan_number = $id_no.'-'.$lender->name.'-'.$inserted_id; 


         $originalapp_date = $request->application_date;
         $new_app_date = strtotime($originalapp_date);
         $new_app_date = date('Y-m-d');

        $date = explode('-', $new_app_date);
        $loan = new Loan;

        //Due amount calculation 
       // $due_amount = $request->loan_amount + (($lender->interest /100) * $request->loan_amount);

        $loan->borrower_id = $request->borrower_id; 
        $loan->loan_number = $loan_number;
        $loan->loan_purpose = $request->loan_purpose;
        $loan->loan_type = $request->loan_type;
        $loan->loan_amount = $request->loan_amount;
        $loan->current_net_salary = $request->net_salary;
        $loan->monthly_payable_amount = 0.00;
        $loan->lender_id = $request->lender_id;
        $loan->application_year =  $date[0];
        $loan->application_month =  $date[2];
        $loan->repayment_period = $request->repayment_period;
        $loan->save();
        Session::flash('success','Loan Create Successfully');
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

       return view('loans.show')->with('loan',Loan::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$borrower_id)
    {
        $borrower = Borrower::find($borrower_id);
        $loan = Loan::find($id);
        return view('loans.edit')->with('borrower',$borrower)
                                   ->with('lenders',Lender::all())
                                   ->with('loan',$loan);
                                 
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

        
        $this->validate($request,[
         'loan_amount'=>'required',
         'application_date'=>'required'
        ]);


        
         $loan_check = Loan::where('borrower_id',$request->borrower_id)
                       ->where('lender_id',$request->lender_id)
                       ->where('loan_type','New')->first();

         if (isset($loan_check) && $request->loan_type == "New") {
         Session::flash('warning','Borrower has already have NEW loan on the same lender ,please select Top Up to Proceed');
        return redirect()->route('loans.create',['id'=>$request->borrower_id])->withInput();
            
         }else{


         // $id_no = $request->id_no;
       
         $lender = Lender::find($request->lender_id);
         // $loan_number = $id_no.'-'.$lender->name.'-'.$inserted_id; 


         $originalapp_date = $request->application_date;
         $new_app_date = strtotime($originalapp_date);
         $new_app_date = date('Y-m-d');

        $date = explode('-', $new_app_date);
        $loan = Loan::find($id);
        //Due amount calculation 
       // $due_amount = $request->loan_amount + (($lender->interest /100) * $request->loan_amount);

        $loan->borrower_id = $request->borrower_id; 
        $loan->loan_number = $request->loan_number;
        $loan->loan_purpose = $request->loan_purpose;
        $loan->loan_type = $request->loan_type;
        $loan->loan_amount = $request->loan_amount;
        $loan->current_net_salary = $request->net_salary;
        $loan->monthly_payable_amount = 0.00;
        $loan->lender_id = $request->lender_id;
        $loan->application_year =  $date[0];
        $loan->application_month =  $date[2];
        $loan->repayment_period = $request->repayment_period;
        $loan->update();
        Session::flash('success','Loan Updated Successfully');
        return redirect()->route('borrower.show',['id'=>$loan->borrower_id]);


         }
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        Session::flash('success','Loan Successfully Deleted');
        return redirect()->back();
    }

      /**
     * Suspended Loans
     *
     */
    public function suspended_loans()
    {
        return view('loans.suspended');
    }

    public function view_approve($id){

         $loan = Loan::where('id',$id)->first();
         $borrower =Borrower::where('id',$loan->borrower_id)->first();
         $privious_loans = Loan::where('borrower_id',$loan->borrower_id)
                        ->where('loan_status','Approved')
                        ->where('lender_id',$loan->lender_id)
                        ->where('active',1)
                        ->first();
    $total_monthly_deduction = DB::table('loans')->where('borrower_id',$borrower->id)
                                                     ->where('loan_status','Approved')
                                                     ->sum('monthly_payable_amount');
                                                   
                       
                        
         $dbDate_rod = Carbon::parse($borrower->rod);
         $diff_in_rod = Carbon::now()->diffInYears($dbDate_rod);
         $dbDate_doe = Carbon::parse($borrower->doe);
         $diff_in_doe = Carbon::now()->diffInYears($dbDate_doe);
         $lender = Lender::where('id',$loan->lender->id)->first();
        return view('loans.approve')->with('loan',$loan)
                                    ->with('borrower',$borrower)
                                    ->with('diff_in_doe',$diff_in_doe)
                                    ->with('diff_in_rod',$diff_in_rod)
                                    ->with('lender',$lender)
                                    ->with('privious_loans',$privious_loans)
                                    ->with('total_monthly_deduction',$total_monthly_deduction );

    } 

    public function loan_approve(Request $request){
        $loan = Loan::find($request->loan_id);
        $lender = Lender::find($loan->lender_id);

        $loan_status = $request->loan_status;
         $due_amount = $loan->loan_amount + (($lender->interest /100) * $loan->loan_amount);
        if($request->loan_type == "New" && $loan_status == "Approved"){   
        $loan = Loan::where('id' ,$request->loan_id)
                      ->where('borrower_id',$request->borrower_id)
                      ->where('loan_number',$request->loan_number)
                      ->update(['loan_status'=>$loan_status,'monthly_payable_amount'=>$request->loan_monthly_payment,
                         'loan_approval_reason'=>$request->approve_reason,
                        'loan_amount'=> $due_amount
                            ]);
                      Session::flash('success','Loan Successfully Approved'); 

         }elseif($request->loan_type == "Top Up" && $request->loan_status == "Approved"){
            
            //Privious loan from the same lender
            $privious_loan = Loan::where('borrower_id',$request->borrower_id)
                            ->where('lender_id',$request->lender_id)
                            ->where('id',$request->privious_loans_id)
                            ->where('active',1)->first();

                          //  dd($request->loan_amount);
                     

            //Outstanding loan after payment
           // $loan_after_payment = ($request->loan_amount - $request->due_amount);

            //Update Privious loan amount
            $privious_loan->active = 0;
            $privious_loan->update();
             $loan = Loan::where('id' ,$request->loan_id)
                      ->where('borrower_id',$request->borrower_id)
                      ->where('loan_number',$request->loan_number)
                      ->update(['loan_amount'=>$request->loan_amount,
                                 'monthly_payable_amount'=>$request->loan_monthly_payment,
                                 'loan_status'=>$loan_status,
                                 'loan_amount'=> $due_amount
                             ]);
              //Deactivate all privious payments
              $payments = Payment::where('borrower_id',$privious_loan->borrower_id)
                                   ->where('lender_id',$privious_loan->lender_id)
                                   ->where('loan_number',$privious_loan->loan_number)
                                   ->get();
             foreach ($payments as $payment) {
                 
                 $payment->active = 0;
                 $payment->update();
             }

            if($loan_status == "Approved"){
             Session::flash('success','Loan Successfully Approved'); 
             }elseif($loan_status == "Declined"){
             Session::flash('success','Loan Successfully Declined'); 
            }
         }else{
             $loan = Loan::where('id' ,$request->loan_id)
                      ->where('borrower_id',$request->borrower_id)
                      ->where('loan_number',$request->loan_number)
                      ->update(['loan_status'=>$loan_status]);
             Session::flash('success','Loan Successfully Declined'); 
         }

        return redirect()->route('borrower.show',['id'=>$request->borrower_id]);

    }

       public function declined_loans()
    {
        $loans = Loan::where('loan_status','Declined')->paginate(2);
        return view('loans.declined-loans')->with('loans',$loans);
    }

    public function add(){
        return "No problem with the code";
    }

    public function pending_loans()
    {
        $loans = Loan::where('loan_status','Pending')->paginate(10);
        return view('loans.pending-loans')->with('loans',$loans);
    }

    public function banch_payments(){

        $loans = Loan::where('loan_status','Approved')
                       ->where('active',1)
                       ->paginate(10);

                      // dd($loans);

        return view('loans.banch_payments')->with('loans',$loans);

        

    }

    public function banch_payments_store(Request $request){
        $month = $request->month;
        $year = $request->year;
       // dd(count($request->loan_id));
        foreach ($request->loan_id as $id) {
        $loan = Loan::find($id);
        $payment[] = [
        'borrower_id' => $loan->borrower_id,
        'lender_id' => $loan->lender_id,
        'loan_number' => $loan->loan_number,
        'loan_id' => $loan->id,
        'payment_year' =>  $year,
         'payment_month' =>  $month,
         'payement_amount' => $loan->monthly_payable_amount
        ]; 
        }


        Payment::insert($payment);

         Session::flash('success','Payment Successfully created'); 

        return redirect()->route('loans.banch_payments'); 

    }

    public function get_loan_payable_amount($loan_number){

        $loan = Loan::where('loan_number',$loan_number);
        
        return json_encode($loan);
    }

  
}
