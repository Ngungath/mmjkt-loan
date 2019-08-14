@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        <a href="{{route('home')}}"> Dashboard</a>
        <small> > Loan Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Loan Details</a></li>
        <li class="active">Dashboard</li>
      </ol>
</section>

<section class="content">

  <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Loan Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td>1.</td>
                  <td style="font-weight: bold;">Loan Number</td>
                  <td>{{$loan->loan_number}}</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td style="font-weight: bold;">Loan purpose</td>
                  <td>{{$loan->loan_purpose}}</td>
                </tr>
                   <tr>
                  <td>3.</td>
                  <td style="font-weight: bold;">Loan Type</td>
                  <td>{{$loan->loan_type}}</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td style="font-weight: bold;">Total Loan Amount</td>
                  <td>{{$loan->loan_amount}}</td>
                </tr>
                  <tr>
                  <td>5.</td>
                  <td style="font-weight: bold;">Monthly payable amount</td>
                  <td>{{$loan->monthly_payable_amount}}</td>
                </tr>
                 <tr>
                  <td>6.</td>
                  <td style="font-weight: bold;">Application Date</td>
                  <td>
                    <?php
                     
                     $monthNum  =  $loan->application_month;
                      $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                      $monthName = $dateObj->format('F'); // March

                    ?>

                    {{$monthName.' ,'.$loan->application_year}}

                  </td>
                </tr>
                <tr>
                  <td>7.</td>
                  <td style="font-weight: bold;">Application Status</td>
                    @if($loan->loan_status == "Pending")
                  <td><span class="badge bg-orange">{{$loan->loan_status}}</span></td>
                  @elseif($loan->loan_status == "Declined")
                  <td><span class="badge bg-red">{{$loan->loan_status}}</span></td>
                  @elseif($loan->loan_status == "Approved")
                  <td><span class="badge bg-green">{{$loan->loan_status}}</span></td>
                  @endif
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
   
</section>



@endsection