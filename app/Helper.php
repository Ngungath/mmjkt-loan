 <?php

  function get_borrowers_payments($borrower_id,$loan_id,$lender_id){

  	                $payments = DB::table('payments')
  	                        
  	                          ->where('borrower_id', $borrower_id)
    	                      ->where('loan_id',$loan_id)
    	                      ->where('lender_id', $lender_id)
    	                       ->sum('payement_amount');

    	                     return $payments;
                              

    	

    }

    ?>