<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use App\unit;
use App\Lender;
use App\Loan;
Use App\Payment;

class RepoprtsController extends Controller
{
    
    Public function view_borrower_report(){
    	

         $borrower = Borrower::find(10);
    	return view('reports.borrower_reports')->with('borrowers',$borrower);
    }

    Public function borrower_report_pdf(){
       
        $borrowers = Borrower::all();
    	///dd($borrowers);

    	$fileName = 'borrowers.pdf';
    	$mpdf = new \Mpdf\Mpdf([
    		'margin_left'=>10,
    		'margin_right'=>10,
    		'margin_top'=>15,
    		'margin_buttom'=>20,
    		'margin_footer'=>10,
    		'margin_header'=>10

    	]);

        $html = \View::make('reports.borrowers_reports_pdf')->with('borrowers',$borrowers);
        $html = $html->render();
     
        $mpdf->SetHeader('Chapter 1|Borrowers List|{PAGENO}');
        $mpdf->SetFooter('JKTLM');
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');

    }

    Public function borrowers_report_find(Request $request){
    	$unit_id = $request->unit;
    	$borrowers = Borrower::where('unit_id',$unit_id)
    	->join('loans','loans.borrower_id','borrowers.id')
    	->where('loans.lender_id',$request->lender)
    	->get();
    	//get unit
    	$unit = Unit::find($unit_id);
    	// dd($unit->name);
    	// echo "<pre>";
    	// print_r($borrowers);
    	// exit();

 
    	return view('reports.borrower_reports')->with('borrowers',$borrowers)
    	                                       ->with('unit',$unit);

    }

    public function get_borrowers_payments($borrower_id,$loan_id,$lender_id){
    	$payments = Payment::selectRaw(sum('payment_amount'))
    	                     ->where('borrower_id',$borrower_id)
    	                     ->where('loan_id',$loan_id)
    	                     ->where('lender_id',$lender_id);

    }
}
