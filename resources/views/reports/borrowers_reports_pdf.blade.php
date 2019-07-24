
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<table style="margin-left: 50px ; text-align: center;">
					<tbody>
						<tr>
							<td>
								<img style="max-height: 70px; max-width: 70px; margin-right:50px" src="{{asset('img/jkt.png')}}">
							</td>
							<td>
								<h3 style="text-decoration: underline;">JESHI LA KUJENGA TAIFA (JKT)</h3>
								 <h4>Orodha ya wadaiwa  Kambi ya <b>{{$unit_name}}</b> , Benki : <b>{{$lender_name}}</b> </h4>
							</td>
							<td>
								<img style="max-height: 70px; max-width: 70px; margin-left: 50px" src="{{asset('img/tzflag.jpg')}}">
							</td>
						</tr>
					</tbody>
				</table>
				
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
