@extends('layouts.app')
 
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Borrower</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">
  <div class="box box-success">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset($borrower->applicant_photo)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$borrower->fname.' '.$borrower->lname}}</h3>

              <p class="text-muted text-center">{{$borrower->rank}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Basic Salary</b> <a class="pull-right">{{$borrower->monthly_basic_salary}}</a>
                </li>
                <li class="list-group-item">
                  <b>Net Salary</b> <a class="pull-right">{{$borrower->monthly_net_salary}}</a>
                </li>
                <li class="list-group-item">
                  <b>Mobile Number</b> <a class="pull-right">{{$borrower->mob_number}}</a>
                </li>
              </ul>
              <form method="get" target="_blank" action="{{route('borrower_individual_report.pdf',['id'=>$borrower->id])}}">
                 <button type="submit" class="btn btn-success btn-block"><b>Priview Profile</b></button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Borrower</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Unit Name</strong>

              <p class="text-muted">
                {{$borrower->unit->name}}
              </p>

               <hr>

              <strong><i class="fa fa-file-text margin-r-5"></i> Unit Number</strong>

              <p class="text-muted">{{$borrower->unit->number}}</p>

              <hr>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Barack Location</strong>

              <p class="text-muted">{{$borrower->location}}</p>

              <hr>

             <!--  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr> -->

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">Profile</a></li>
              <li class=""><a href="#loan" data-toggle="tab" aria-expanded="false">Loan</a></li>
              <li><a href="#payments" data-toggle="tab">Payments</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="profile">
             <!-- Profile start-->
            

             <!-- End profile -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="loan">

                <!-- Loan Tab start -->
             <div class="box box-success">
            <div class="box-header" style="padding-bottom: 5px;">
              <h3 class="box-title">Borrower Payments</h3>
               <a href="{{route('loans.create',['id'=>$borrower->id])}}" class="btn btn-success pull-right"><b>Add Loan</b></a>

            </div>
            <hr>
            <!-- /.box-header -->
             <table id="table-loan" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th>SN</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">Principal</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 160px;">Due</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Total Payments</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 153px;">Lender</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 100px;">Status</th><th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 200px;">Action</th></tr>
                </thead>
                <tbody>
                   <?php
                 $i=1;
                 //App\Payment::where();
                 ?>
                @foreach($loans as $loan)
                 <?php
                $total_payment = App\Payment::where('loan_number',$loan->loan_number)
                                                        ->where('lender_id',$loan->lender->id)
                                                        ->sum('payement_amount');
                                                       //dd($loan->lender->name);

                 ?>
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$loan->loan_amount}}</td>
                  <td>{{($loan->loan_amount - $total_payment)}}</td>
                  <td><a href="#">{{$total_payment}}</a></td>
                   <td>{{$loan->lender->name}}</td>
                  @if($loan->loan_status == "Approved")
                 <td><span class="label label-success">{{$loan->loan_status}}</span></td>
                 @elseif($loan->loan_status == "Pending")
                <td><span class="label label-warning">{{$loan->loan_status}}</span></td>
                   @elseif($loan->loan_status == "Declined")
                <td><span class="label label-danger">{{$loan->loan_status}}</span></td>
                  @endif
                          
                  <td>
                    <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('loan.wiew_approve',['id'=>$loan->id])}}">Approve Loan</a></li>
                    <li><a href="{{route('loan_payment.single',['id'=>$loan->id])}}">Add Payment</a></li>
                    <li><a href="#">Edit Loan</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Preview Loan</a></li>
                  </ul>
                </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>

          <!-- Loan Tab End-->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="payments">

                <!-- Payments Table Start -->
           <div class="box box-success">
            <div class="box-header" style="padding-bottom: 10px;">
              <h3 class="box-title">Borrower Payments</h3>
              <a class="btn btn-success pull-right" href="{{route('payment.create',['id'=>$borrower->id])}}">Add Payment</a>

            </div>
            <hr>
            <!-- /.box-header -->
             <table id="table-payment" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th>SN</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">Payed Amount</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 225px;">Payment Date</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Lender</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 153px;">Loan Number</th><th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">Action</th></tr>
                </thead>
                <tbody>
                   <?php $i=1 ; ?>
                @foreach($payments as $payment)

                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$payment->payement_amount}}</td>
                  <td>{{$payment->payment_month.' '.$payment->payment_year}}</td>
                  <td>{{App\Lender::where('id',$payment->lender_id)->first()->name}}</td>
                 <td>{{$loan->loan_number}}</td>                          
                  <td>
                    <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Preview Payments</a></li>
                    <li><a href="#">Edit Payment</a></li>
                    <li><a href="#">Delete Payment</a></li>
                  </ul>
                </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
             <!-- Payments Table End -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    </section>
@endsection
