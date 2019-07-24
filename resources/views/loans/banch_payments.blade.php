@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Batch Loan Approval</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Banch Loan Approval</h3>
            </div>
            <!-- /.box-header -->
            <form method="POST" action="{{route('banch_payments_store')}}" id="banch_payments_form">
              {{csrf_field()}}

            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Borrower</th>
                  <th>Loan Amount</th>
                  <th>Monthly Payment</th>
                  <th>Select</th>
                </tr>
                <?php $id = 1?>
                @foreach($loans as $loan)
                <?php $borrower = App\Borrower::find($loan->borrower_id);?>
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{ucfirst($borrower->fname).' '.ucfirst($borrower->lname)}}</td>
                  <td>{{$loan->loan_amount}}</td>
                  <td>{{$loan->monthly_payable_amount}}</td>
                  <div class="checkbox">
                  <td>
                    
                    <input type="checkbox" class="payment" name="loan_id[]" value="{{$loan->id}}">
                    
                  </td>
                  </div>
                  
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="row">
            <div class="col col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Select Year</label>
                <select class="form-control" name="year" id="year">
                  <?php 
                  $current_year = date('Y');
                  $ranges = range($current_year, $current_year+30);
                  foreach ($ranges as $range) {
                    ?>
                     <option value="2019">{{$range}}</option>
                    <?php
                    
                  }
                  ?>
                           
                </select>
              </div>
            </div>

              <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Select Month</label>
                <select class="form-control" name="month" id="month">
                  <?php 
                  for ($m=1; $m<=12; $m++) {
                     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                     ?>
                     <option value="{{$month}}">{{$month}}</option>
                     <?php
                     }
                  ?>
                             
                </select>
              </div>
            </div>
            <div class="col-md-4">
                 <div class="form-group">
          
                  <button type="button" id="pay_all_btn" style="margin-top: 25px" class="btn btn-success">Make Payment</button>
                  <br>

              </div> 
                <div class="form-group pull-right" style="margin-right:100px; margin-top: -45px">
                  <div class="checkbox">
                  <label class="label-control">Select All
                  <input type="checkbox" name="select_all" id="pay_all">
                  </label>
                </div>
              </div> 
            </div>

            </div>
            </div>
            </form>
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{$loans->links()}}
              </ul>
            </div>
          </div>
   
</section>



@endsection