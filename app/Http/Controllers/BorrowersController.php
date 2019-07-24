<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use Session;
use App\Loan;
use Carbon\Carbon;
use App\Payment;

class BorrowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('borrowers.index');
        $borrowers = Borrower::paginate(10);
        //dd($borrowers);
       return view('borrowers.index')->with('borrowers',$borrowers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('borrowers.index2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $borrower= new Borrower;
       $borrower_photo_new ="";
    if ($request->hasFile('applicant_photo')) {
        
        $borrower_photo = $request->applicant_photo;

        $borrower_photo_new = time().$borrower_photo->getClientOriginalName();

        $borrower_photo->move('uploads/borrowers_photos',$borrower_photo_new);

        $borrower_photo_new = 'uploads/borrowers_photos/'.$borrower_photo_new;
     }
     $newDob =date('Y-m-d',strtotime($request->dob));
     $newDoe =date('Y-m-d',strtotime($request->doe)) ;
     $newRod =date('Y-m-d',strtotime($request->rod)) ;
    // dd($newRod);

    $borrower->fname = $request->fname;
    $borrower->mname = $request->mname;
    $borrower->fname = $request->fname;
    $borrower->lname = $request->lname;
    $borrower->dob =  $newDob;
    $borrower->place_birth = $request->place_birth;
    $borrower->comp_number = $request->comp_number;
    $borrower->id_no = $request->id_number;
    $borrower->mob_number = $request->mob_number;
    $borrower->hom_number = $request->hom_number;
    $borrower->gender = $request->gender;
    $borrower->contract_status = $request->contract_status;
    $borrower->salary_bank = $request->salary_bank;
    $borrower->bank_acc_number = $request->bank_acc_number;
    $borrower->bank_branch = $request->bank_branch;
    $borrower->loan_type = $request->loan_type;
    $borrower->applicant_photo = $borrower_photo_new;
    $borrower->unit_id = $request->unit_id;
    $borrower->doe = $newDoe;
    $borrower->rod = $newRod;
    $borrower->rank = $request->rank;
    $borrower->monthly_basic_salary = $request->monthly_basic_salary;
    $borrower->monthly_net_salary = $request->monthly_net_salary;
    $borrower->save();
    Session::flash('success','Borrower added successfuly.');
    return redirect()->route('borrower.index');
    





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loans = Loan::where('borrower_id',$id)
                       ->where('active',true)
                       ->get();
        $payments = Payment::where('borrower_id',$id)
                             ->where('active',true)
                             ->get();
       
        $borrower = Borrower::find($id);
        return view('borrowers.show')->with('borrower',$borrower)
                                     ->with('loans',$loans)
                                     ->with('payments',$payments);
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
        $borrower = Borrower::find($id);
        $borrower->delete();
        Session::flash('success','Borrower successfuly suspended');
        return redirect()->back();

    }

    public function suspended_borrowers()
    {
        $borrower = Borrower::onlyTrashed()->get();
        return view('borrowers.suspended')->with('borrowers',$borrower);
    }
    public function restore($id){
     $borrower = Borrower::withTrashed()->where('id',$id)->restore();
     Session::flash('success','Borrower successfully restored');
     return redirect()->route('borrower.index');
    }

    public function delete($id){
        
        $borrower = Borrower::withTrashed()->where('id',$id);
       // dd($borrower);
        $borrower->forceDelete();
        Session::flash('success', 'Borrower successfully deleted');
        return redirect()->route('borrower.index');

    }

 
}
