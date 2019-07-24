
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<table style="margin-left: 120px ; text-align: center;">
					<tbody>
						<tr>
							<td>
								<img style="max-height: 70px; max-width: 70px; margin-right:50px" src="{{asset('img/jkt.png')}}">
							</td>
							<td>
								<h3 style="text-decoration: underline;">JESHI LA KUJENGA TAIFA (JKT)</h3>
								<h4>Borrower Information</h4>
							</td>
							<td>
								<img style="max-height: 70px; max-width: 70px; margin-left: 50px" src="{{asset('img/tzflag.jpg')}}">
							</td>
						</tr>
					</tbody>
				</table>
				
			<hr>
            <h4>Personal Detail</h4>
			<table class="blueTable">
			<tr><td><h4>Borrower Photo</h4></td><td><img style="max-height: 70px; max-width: 70px; text-align: center;" src="{{asset('uploads/borrowers_photos/1563429567passport-jkt.png')}}"></td></tr>
			<tbody>
			
                <tr>
                  <td><b>Borrower Name</b></td><td>{{$borrower->fname.' '.$borrower->lname}}</td>
                </tr>
                <tr>
                  <td><b>Date of Birth</b></td><td>{{$borrower->dob}}</td>
                </tr>
                 <tr>
                  <td><b>Place of Birth</b></td><td>{{$borrower->place_birth}}</td>
                </tr>
                 <tr>
                  <td><b>Computer Number</b></td><td>{{$borrower->comp_number}}</td>
                </tr>
                  <tr>
                  <td><b>Mobile Number</b></td><td>{{$borrower->mob_number}}</td>
                </tr>
                 <tr>
                  <td><b>Gender</b></td><td>{{$borrower->gender}}</td>
                </tr>
                <tr>
                  <td><b>Contract Status</b></td><td>{{$borrower->contract_status}}</td>
                </tr>
                 <tr>
                  <td><b>Receive Salary Through</b></td><td>{{$borrower->salary_bank}}</td>
                </tr>
                <tr>
                  <td><b>Bank Account Number</b></td><td>{{$borrower->bank_acc_number}}</td>
                </tr>
			</tbody>
			</table>
			<hr>
            <h4>Employment Details</h4>
			<table class="blueTable">
			<tbody>
			     <tr>
                  <td><b>Job Rank</b> </td><td>{{$borrower->rank}}</td>
                </tr>
                <tr>
                  <td><b>Barack Name</b></td><td>{{$unit_name}}</td>
                </tr>
                <tr>
                  <td><b>Date of Employment</b></td><td>{{$borrower->doe}}</td>
                </tr>
                 <tr>
                  <td><b>Date of Retirement</b></td><td>{{$borrower->rod}}</td>
                </tr>
               
              <tr>
                  <td><b>Monthly Basic Salary</b></td><td>{{$borrower->monthly_basic_salary}}</td>
                </tr>
                <tr>
                  <td><b>Monthly Net Salary</b></td><td>{{$borrower->monthly_net_salary}}</td>
                </tr>
			</tbody>
			</table>
			<hr>
            <h4>Loan Details</h4>
			<table class="blueTable">
				<thead>
					<tr>
					<th>SN</th>
					<th>Laon Amount</th>
					<th>Lender</th>
					<th>Total payment</th>
					<th>Due Amount</th>
					</tr>
				</thead>
			<tbody>
				<?php $i=1; ?>
				@foreach($loans as $loan)
				<?php
				
				$total_payment = App\Payment::where('loan_number',$loan->loan_number)
                                                        ->where('lender_id',$loan->lender->id)
                                                        ->sum('payement_amount');
                                                        ?>
			     <tr>
			     <td>{{$i++}}</td>
					<td>{{$loan->loan_amount}}</td>
					<td>{{$loan->lender->name}}</td>
					<td>{{$total_payment}}</td>
					<td>{{($loan->loan_amount - $total_payment)}}</td>	
                </tr>
                @endforeach
			</tbody>
			</table>
			
			</html>
