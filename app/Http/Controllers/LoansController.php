<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use Carbon\Carbon;
use App\lender;
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
        $loans = Loan::paginate(2);
        //$loans['payments']= 
        return view('loans.index')->with('loans',$loans);
    }

    public function declined_loans()
    {
        $loans = Loan::where('loan_status','Declined')->paginate(2);
        return view('loans.declined-loans')->with('loans',$loans);
    }

    public function pending_loans()
    {
        $loans = Loan::where('loan_status','Pending')->paginate(2);
        return view('loans.pending-loans')->with('loans',$loans);
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
        //  $last_id = Loan::all()->last() ;
         if(Loan::all()->last()  == null){
            $id = 0;
            $last_inserted_id =$id + 1;

         }else{

            $last_inserted_id = Loan::all()->last()->id;
         }
         
         
         $inserted_id = $last_inserted_id + 1;
         $barack_number = $request->barack_number;
         $lender = Lender::find($request->lender_id)->name;
         $loan_number = $barack_number.'-'.$lender.'-'.$inserted_id; 


         $originalapp_date = $request->application_date;
         $new_app_date = strtotime($originalapp_date);
         $new_app_date = date('Y-m-d');

         $date = explode('-', $new_app_date);
       //  dd($date);

        $loan = new Loan;

        $loan->borrower_id = $request->borrower_id; 
        $loan->loan_number = $loan_number;
        $loan->loan_purpose = $request->loan_purpose;
        $loan->loan_type = $request->loan_type;
        $loan->loan_amount = $request->loan_amount;
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

    public function view_approve($id){

        $loan = Loan::where('id',$id)->first();
        $borrower =Borrower::where('id',$loan->borrower_id)->first();
        //difference in date of retirement

        // $date = Carbon::parse($borrower->rod);
        // $now = Carbon::now();

        // $diff = $date->diffInYears($now);
        // dd($diff);

         $dbDate_rod = Carbon::parse($borrower->rod);
         $diff_in_rod = Carbon::now()->diffInYears($dbDate_rod);
        //differnce in date of employemnt
         $dbDate_doe = Carbon::parse($borrower->doe);
         $diff_in_doe = Carbon::now()->diffInYears($dbDate_doe);
        
    

       // dd($borrower);
        return view('loans.approve')->with('loan',$loan)
                                    ->with('borrower',$borrower)
                                    ->with('diff_in_doe',$diff_in_doe)
                                    ->with('diff_in_rod',$diff_in_rod);

    } 

    public function loan_approve(Request $request){
      
       

        $loan = Loan::where('id' ,$request->loan_id)
                      ->where('borrower_id',$request->borrower_id)
                      ->where('loan_number',$request->loan_number)
                      ->update(['loan_status'=>$request->loan_status]);


        Session::flash('success','Loan Create Successfully');
        return redirect()->route('borrower.show',['id'=>$request->borrower_id]);

    }
}
