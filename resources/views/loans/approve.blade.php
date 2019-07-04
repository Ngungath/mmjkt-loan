@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Loan Approval Form</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
   <!-- Borrower Information -->
              <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Borrower Information</b> <span class="text-center">{{$borrower->fname.' '.$borrower->lname}}</span></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
      <div class="box-body no-padding">
              <table class="table table-bordered">
                <tbody>
                <tr>
                
                  <td>Basic Salary</td>
                   <td>{{$borrower->monthly_basic_salary}}</td>
                   <td>Maximum Deduction Amount per Month : {{(1/3*$borrower->monthly_basic_salary)}}</td>
                </tr>
                <tr>
                  
                  <td>Date of Employement</td>
                  <td><span class="">{{$borrower->doe}}</span></td>
                   <td>Years since employment <span class="label label-danger">{{$diff_in_doe}}</span></td>
                </tr>
                 <tr>
                  
                  <td>Date of Retirement</td>
                  <td><span class="">{{$borrower->rod}}</span></td>
                   <td>Years remains untill retirement <span class="label label-danger">{{$diff_in_rod}}</span></td>
                </tr>
              </tbody></table>
              <hr>
              @if($loan->loan_type == 'Top Up')
              <div class="box-header with-border">
          <h3 class="box-title"><b>Privious Loan Details</b></h3>
              </div>

              @endif
            </div>
        <!-- /.box-body -->
      </div>
            <!-- End Borrower information -->
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Loan Information</h3>
            </div>
            <!-- /.box-header -->
           

            <!-- form start -->
            <form role="form" method="post" action="{{route('loan.approve')}}">
              {{csrf_field()}}
              <input type="hidden" name="borrower_id" value="{{$loan->borrower_id}}">
               <input type="hidden" name="loan_id" value="{{$loan->id}}">
                  <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Loan Application Number <span class="required2">*</span></label>
                    <input type="text" name="loan_number" readonly="readonly" value="{{$loan->loan_number}}" id="loan_number" class="form-control">
                    <span id="loan_number_error"  class="text-danger"></span>
                    </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Loan Purpose</label>
                    <input type="text" name="loan_purpose" readonly="readonly" value="{{$loan->loan_purpose}}" class="form-control">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Loan Type <span class="required2">*</span></label>
                   <select id="loan_type" name="loan_type" class="form-control">
                     <option selected value="{{$loan->loan_type}}">{{$loan->loan_type}}</option>
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
                  <input type="text" class="form-control pull-right" name="application_date" id="application_date" value="{{$loan->application_date}}" readonly="readonly" placeholder="Loan Date">
                </div>
                    <span id="loan_number_error" class="text-danger"></span>
                    </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Lender</label>
                    <select class="form-control" name="lender">
                      <option value="NMB">NMB</option>
                      <option value="CRDB">CRDB</option>
                      <option value="PBZ">PBZ</option>
                    </select>
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Repayment Period <span class="required2">*</span></label>
                   <input type="number" required="required" value="{{$loan->repayment_period}}" readonly="readonly" name="repayment_period" id="repayment_period" class="form-control">
                    <span class="text-danger" id="lname_type"></span>
                    </div>
                    </div>
                </div>
              </div>

               <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label class="control-label">Loan Amount</label>
                    <input type="text" required="required" value="{{$loan->loan_amount}}" name="loan_amount" readonly="readonly" id="loan_amount" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label class="control-label">Laon Status</label>
                    <select class="form-control" name="loan_status" id="loan_status">
                      <option value="0">Select loan status</option>
                     <option value="Approved">Approved</option>  
                     <option value="Declined">Declined</option> 
                    </select>

                     </div>
                  </div>
                </div>
              </div>
              <br />
        <div align="center">
             <button type="submit" name="loan" id="loan" class="btn btn-success btn-lg">Approve Loan</button>
        </div>
        <br />

            </form>

          </div>

  
</div>
</section>
@endsection
