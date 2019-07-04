<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use Session;
use App\Loan;
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
       return view('borrowers.index')->with('borrowers',Borrower::paginate(3));
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

       // dd($borrower_photo_new);

        $borrower_photo->move('uploads/borrowers_photos',$borrower_photo_new);

        $borrower_photo_new = 'uploads/borrowers_photos/'.$borrower_photo_new;
     }

     $originalDob = $request->dob;
     $newDob = strtotime($originalDob);
     $newDob = date('Y-m-d');

     $originalRod = $request->rod;
     $newRod = strtotime($originalRod);
     $newRod = date('Y-m-d');
     //dd($newDate);
   
     $originalDoe = $request->doe;
     $newDoe = strtotime($originalDoe);
     $newDoe = date('Y-m-d');

    $borrower->loan_number = $request->loan_number;
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
    $borrower->barack_name = $request->barack_name;
    $borrower->barack_number = $request->barack_number;
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
        $loans = Loan::where('borrower_id',$id)->get();
        $payments = Payment::where('borrower_id',$id)->get();
       
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
        //
    }
}
