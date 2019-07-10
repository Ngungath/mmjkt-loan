
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
			<div style="text-align: center;">
		   <img style="max-height: 70px; max-width: 70px; text-align: center;" src="{{asset('img/jkt.png')}}">
		   <br>
		   <h4>Orodha ya wadaiwa  Kambi ya <b>{{$unit_name}}</b> , Benki : <b>{{$lender_name}}</b> </h4>
			</div>
			<hr>
			<table class="blueTable">
			<thead>
			<tr>
			 <th style="width: 10px">#</th>
			 <th>Borrower Name</th>
			 <th>Unit</th>
			 <th>Lender</th>
			 <th>Loan Amount</th>
			 <th>Due Amount</th>
			</tr>
			</thead>
			<tbody>
			@foreach($borrowers as $borrower)
                <?php
                $total_payment = get_borrowers_payments($borrower->borrower_id,$borrower->id,$borrower->lender_id);
                ?>
                <tr>
                  <td>1.</td>
                  <td>{{$borrower->fname.' '.$borrower->lname}}</td>
                  <td>{{$unit_name}}</td>
                  <td>{{$lender_name}}</td>
                  <td>{{$borrower->loan_amount}}</td>
                  <td>{{$borrower->loan_amount - $total_payment}}</td>
                </tr>
                @endforeach
			</tbody>
			</tr>
			</table>
			</body>
			</html>
