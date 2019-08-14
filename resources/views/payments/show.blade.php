@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        <a href="{{route('home')}}"> Dashboard</a>
        <small> > Payment Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Payment Details</a></li>
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
                  <td style="font-weight: bold;">Borrower</td>
                  <td>{{App\Borrower::find($payment->borrower_id)->fname}}</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td style="font-weight: bold;">Lender</td>
                  <td>{{App\Lender::find($payment->lender_id)->name}}</td>
                </tr>
                   <tr>
                  <td>3.</td>
                  <td style="font-weight: bold;">Loan Number</td>
                  <td>{{$payment->loan_number}}</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td style="font-weight: bold;">Amount Payed</td>
                  <td><span class="badge bg-green">{{number_format($payment->payement_amount)}} /=</span></td>
                </tr>
                  <tr>
                  <td>5.</td>
                  <td style="font-weight: bold;">Payment Date</td>
                  <td>{{$payment->payment_month.' ,'.$payment->payment_year}}</td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
   
</section>



@endsection