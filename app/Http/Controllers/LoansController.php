<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use Carbon\Carbon;
use App\Lender;
use App\Loan;
use Session;


class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::paginate(10);
        //$loans['payments']= 
        return view('loans.index')->with('loans',$loans);
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
         if(Loan::all()->last()  == null){
            $id = 0;
            $last_inserted_id =$id + 1;

         }else{

            $last_inserted_id = Loan::all()->last()->id;
         }
         
         
         $inserted_id = $last_inserted_id + 1;
         $id_no = $request->id_no;
         $lender = Lender::find($request->lender_id)->name;
         $loan_number = $id_no.'-'.$lender.'-'.$inserted_id; 


         $originalapp_date = $request->application_date;
         $new_app_date = strtotime($originalapp_date);
         $new_app_date = date('Y-m-d');

        $date = explode('-', $new_app_date);
        $loan = new Loan;
        $loan->borrower_id = $request->borrower_id; 
        $loan->loan_number = $loan_number;
        $loan->loan_purpose = $request->loan_purpose;
        $loan->loan_type = $request->loan_type;
        $loan->loan_amount = $request->loan_amount;
        $loan->monthly_payable_amount = 0.00000000;
        $loan->lender_id = $request->lender_id;
        $loan->application_year =  $date[0];
        $loan->application_month =  $date[2];
        $loan->repayment_period = $request->repayment_period;
        $loan->save();
        Session::flash('success','Loan Create Successfully');
        return redirect()->route('borrower.show',['id'=>$request->borrower_id]);

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
    public function suspended_loans()
    {
        return view('loans.suspended');
    }

    public function view_approve($id){

         $loan = Loan::where('id',$id)->first();
         $borrower =Borrower::where('id',$loan->borrower_id)->first();
         $loans = Loan::where('borrower_id',$loan->borrower_id)
                        ->where('loan_status','Approved')->get();
                        
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
                                    ->with('loans',$loans);

    } 

    public function loan_approve(Request $request){
       // dd($request);
        $loan_status = $request->loan_status;
        $loan = Loan::where('id' ,$request->loan_id)
                      ->where('borrower_id',$request->borrower_id)
                      ->where('loan_number',$request->loan_number)
                      ->update(['loan_status'=>$loan_status,'monthly_payable_amount'=>$request->loan_monthly_payment,
                         'loan_approval_reason'=>$request->approve_reason
                            ]);
                      if($loan_status == "Approved"){
                         Session::flash('success','Loan Successfully Approved'); 
                      }elseif($loan_status == "Declined"){
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

        $loans = Loan::where('loan_status','Approved')->paginate(10);

        return view('loans.banch_payments')->with('loans',$loans);

        

    }
}
