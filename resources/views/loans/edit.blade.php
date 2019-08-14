@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
       <a href="{{route('home')}}">Dashboard</a> 
        <small> > Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Create new loans</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Loan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" method="post" action="{{route('loan.update',['id'=>$loan->id])}}">
              
              {{csrf_field()}}
              <input type="hidden" name="loan_number" value="{{$loan->loan_number}}">
              <input type="hidden" name="borrower_id" value="{{$borrower->id}}">
              <input type="hidden" name="id_no" value="{{$borrower->id_no}}">
              <input type="hidden" name="loan_id" value="{{$loan->id}}">
                  <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Current Net Sallary(Take Home)<span class="required2">*</span></label>
                    <input type="text" required="required" name="net_salary" id="net_salary" class="form-control" value="{{$loan->current_net_salary}}">
                    <span id="loan_number_error" class="text-danger"></span>
                    </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Loan Purpose</label>
                    <input type="text" name="loan_purpose" class="form-control" value="{{$loan->loan_purpose}}">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Loan Type <span class="required2">*</span></label>
                   <select id="loan_type" name="loan_type" class="form-control">
                  <option selected value="{{$loan->loan_type}}">{{$loan->loan_type}}</option>
                     <option value="New">New</option>
                     <option value="Top Up">Top Up</option>
                   </select>
                    <span class="text-danger" id="lname_type_error"></span>
                    </div>
                    </div>
                </div>
              </div>
              

              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Loan Application Date <span class="required2">*</span></label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" required="required" value="{{old('application_date')}}" class="form-control pull-right"  name="application_date" id="application_date" placeholder="Loan Date">
                </div>
                    <span id="loan_number_error" class="text-danger"></span>
                    </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Lender</label>
                    <select class="form-control" name="lender_id">
                      <option value="{{$loan->lender_id}}">{{App\Lender::where('id',$loan->lender_id)->first()->name}}</option>
                      @foreach($lenders as $lender)
                      <option value="{{$lender->id}}">{{$lender->name}}</option>
                      @endforeach
                    </select>
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Repayment Period (Number of Years) <span class="required2">*</span></label>
                   <input type="number" required="required" value="{{$loan->repayment_period}}" name="repayment_period" id="repayment_period" class="form-control">
                    <span class="text-danger" id="lname_type"></span>
                    </div>
                    </div>
                </div>
              </div>

               <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                    <div class="form-group text-center">
                    <label class="control-label text-center">Loan Amount <span class="required2">*</span></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <input type="text"  name="loan_amount" id="loan_amount" value="{{old('loan_amount')}}" class="form-control">
                    @if ($errors->has('loan_amount'))
                    <span id="loan_amount_error" class="text-danger">{{$errors->first('loan_amount')}}</span>
                    @endif
                  </div>
                  <div class="col-md-2">
                    
                  </div>
                </div>
              </div>
              <br />
        <div align="center">
             <button type="submit" name="loan" id="loan" class="btn btn-success btn-lg">update Loan</button>
        </div>
        <br />

            </form>

          </div>

  
</div>
</section>
@endsection
