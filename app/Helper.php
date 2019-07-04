 <?php

  public function get_borrowers_payments($borrower_id,$loan_id,$lender_id){
    	$payments = Payment::selectRaw(sum('payment_amount'))
    	                     ->where('borrower_id',$borrower_id)
    	                     ->where('loan_id',$loan_id)
    	                     ->where('lender_id',$lender_id);

    }

    ?>