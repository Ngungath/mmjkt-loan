@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Create new payment</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Payment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('payment.store')}}">
              {{csrf_field()}}
              <input type="hidden" name="borrower_id" value="{{$borrower_id}}">
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Select Loan Number</label>
                    <input type="text" name="loan_number" class="form-control" value="{{$loan->loan_number}}" readonly="readonly">
                    </div>
                   </div>
                </div>
                
              </div>
                  <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label class="control-label">Repayment Amount <span class="required2">*</span></label>
                    <input type="text" name="payment_amount" id="payment_amount" class="form-control" value="{{$loan->monthly_payable_amount}}" readonly="readonly">
                    <span id="loan_number_error" class="text-danger"></span>
                    </div>
                  </div>
             
                      <div class="col-md-6">
                    <div class="form-group">
                    <label class="control-label">Repayment Date <span class="required2">*</span></label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="repayment_date" id="application_date" >
                </div>
                    <span id="loan_number_error" class="text-danger"></span>
                    </div>
                  </div>
                </div>
              </div>
      
              <br />
        <div align="center">
             <button type="submit" name="loan" id="loan" class="btn btn-success btn-lg">Add Payment</button>
        </div>
        <br />

            </form>

          </div>

  
</div>
</section>
@endsection
