 <?php

  function get_borrowers_payments($borrower_id,$loan_id,$lender_id){

  	                $payments = DB::table('payments')
  	                        
  	                          ->where('borrower_id', $borrower_id)
    	                      ->where('loan_id',$loan_id)
    	                      ->where('lender_id', $lender_id)
    	                       ->sum('payement_amount');

    	                     return $payments;
                              

    }

    function get_monthly_repayment($loan_amount , $interest ,$number_of_payment_years){
      $i = $interest ;  
      $term = $number_of_payment_years * 12;
      $amt = $loan_amount;

      //Calculate loan repayment per month
      $int = $i/1200;
      $int1 = 1+$int;
      $r1 = pow($int1, $term);

      $pmt = $amt*($int*$r1)/($r1-1);

      return $pmt;

    }

    ?>