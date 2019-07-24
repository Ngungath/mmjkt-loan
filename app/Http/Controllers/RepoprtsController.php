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
          $styleSheet = file_get_contents(url('/css/mpdf.css'));
    	//dd($styleSheet);

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
        $styleSheet = file_get_contents(url('/css/mpdf.css'));

        $mpdf->WriteHTML($styleSheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output('S');

    }

    Public function borrowers_report_find(Request $request){
    	//dd($request->pdf);
    	$unit_id = $request->unit;
    	$borrowers = Borrower::where('unit_id',$unit_id)
        ->where('active',1)
    	->join('loans','loans.borrower_id','borrowers.id')
    	->where('loans.lender_id',$request->lender)
    	->select('loans.*','borrowers.fname','borrowers.lname')
    	->get();

    	//get unit
    	$unit = Unit::find($unit_id);
        $lender = Lender::find($request->lender);

    	//dd($unit->name);
    	// echo "<pre>";
    	// print_r($borrowers);
    	// exit();
    	//dd($borrowers['unit']);
    	//$borrowers['unit']=$unit->name;

    	 if (isset($request->pdf)) {
        // echo "<pre>";
        // print_r($borrowers);
        // exit();
    	 	
    	 	$fileName = 'borrowers.pdf';
    	   $mpdf = new \Mpdf\Mpdf([
    		'margin_left'=>10,
    		'margin_right'=>10,
    		'margin_top'=>15,
    		'margin_buttom'=>20,
    		'margin_footer'=>10,
    		'margin_header'=>10

    	]);

        $html = \View::make('reports.borrowers_reports_pdf')->with('borrowers',$borrowers)
                                                ->with('unit_name',$unit->name)
                                                ->with('lender_name',$lender->name);
        $html = $html->render();
     
        $mpdf->SetHeader('JKTLM |Borrowers List|{PAGENO}');
        $mpdf->SetFooter('JKTLM');
        $styleSheet = file_get_contents(url('/css/mpdf.css'));

        $mpdf->WriteHTML($styleSheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');

    	 }else{


    	return view('reports.borrower_reports')->with('borrowers',$borrowers)
    	                                        ->with('unit_name',$unit->name)
    	                                        ->with('lender_name',$lender->name)
                                                ->with('lender_id',$request->lender)
                                                ->with('unit_id',$request->unit);



    	 }


    }

      public function borrower_individual_report_pdf($id){
        $borrower = Borrower::find($id);
        $unit_name = Unit::find($borrower->unit_id)->name;
        $loans = Loan::where('borrower_id',$borrower->id)
                      ->where('active',1)->get();



        $fileName = 'borrower.pdf';
           $mpdf = new \Mpdf\Mpdf([
            'margin_left'=>10,
            'margin_right'=>10,
            'margin_top'=>15,
            'margin_buttom'=>20,
            'margin_footer'=>10,
            'margin_header'=>10

        ]);

        $html = \View::make('reports.borrower_individual_report_pdf')
        ->with('borrower',$borrower)
        ->with('unit_name',$unit_name)
        ->with('loans',$loans);
        $html = $html->render();
     
        $mpdf->SetHeader('JKTLM |Borrower Information|{PAGENO}');
        $mpdf->SetFooter('JKTLM');
        $styleSheet = file_get_contents(url('/css/mpdf.css'));

        $mpdf->WriteHTML($styleSheet,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
      

       }


}
