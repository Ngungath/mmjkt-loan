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
              <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Borrower Information for</b> <span class="text-center">{{$borrower->fname.' '.$borrower->lname}}</span></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <?php 
          $max_deduction = round((1/3*$loan->current_net_salary));
          $monthly_repayment = round(get_monthly_repayment($loan->loan_amount, $lender->interest, $loan->repayment_period));

        ?>
      <div class="box-body no-padding">
              <table class="table table-bordered">
                <tbody>
                <tr>
                
                  <td>Net Salary</td>
                   <td>{{$loan->current_net_salary}}</td>
                   <td>Maximum Deduction Amount per Month : {{$max_deduction}}</td>
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
                <tr>
                  <td></td>
                  <td>Monthly Loan Repayment</td>
                  <td>Tsh : {{$monthly_repayment}}</td>
                </tr>
              </tbody></table>
              <hr>
            @if($loan->loan_type == 'Top Up' && isset($privious_loans))
            <?php $id = 1 ;

            ?>
              <div class="box-header with-border">
              <h3 class="box-title"><b>Privious Loan Details</b></h3>
              </div>
              <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td><b>SN</b></td>
                  <td><b>Loan Amount</b></td>
                   <td><b>Lender</b></td>
                   <td><b>Due Amount</b></td>
                </tr>
               
                <?php  
                $lender_name = explode('-',$privious_loans->loan_number);
                $total_payment = get_borrowers_payments($privious_loans->borrower_id,$privious_loans->id,$privious_loans->lender_id);
                $due_payment = $privious_loans->loan_amount - $total_payment;

                ?>
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{$privious_loans->loan_amount}}</td>
                  <td>{{$lender_name[1]}}</td>
                  <td>{{$due_payment}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        @endif
            </div>
        <!-- /.box-body -->
      </div>
            <!-- End Borrower information -->
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Loan Information</h3>
            </div>
            <!-- /.box-header -->
           
            
            <!-- form start -->
            <form role="form" method="post" id="approve_form" action="{{route('loan.approve')}}">
              {{csrf_field()}}
              @if(isset($privious_loans))
              <input type="hidden" name="due_amount" id="due_amount" value="{{$due_payment}}">
              <input type="hidden" name="lender_id" value="{{$privious_loans->lender_id}}">
              <input type="hidden" name="privious_loans_id" value="{{$privious_loans->id}}">
              
              @endif
              <input type="hidden" name="borrower_id" id="borrower_id" value="{{$loan->borrower_id}}">
               <input type="hidden" name="loan_id" id="loan_id" value="{{$loan->id}}">
               <input type="hidden" name="loan_monthly_payment" id="loan_monthly_payment" value="{{$monthly_repayment}}">
               <input type="hidden"  name="max_deduction" id="max_deduction" value="{{$max_deduction}}">
               <input type="hidden" name="diff_in_doe" id="diff_in_doe" value="{{$diff_in_doe}}">
               <input type="hidden" name="diff_in_rod" id="diff_in_rod" value="{{$diff_in_rod}}">

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
                    <input type="text" name="loan_type" value="{{$loan->loan_type}}" class="form-control" readonly="readonly">
                 
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
                    <input type="tex" name="Application_date" value="{{$loan->application_year}}" class="form-control" readonly="readonly">
                    </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Lender</label>
                    <input class="form-control" type="text" name="lender" value="{{$lender->name}}" readonly="readonly">
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
              <hr>
              <div class="row" id="approve_reason">
                <div class="col col-md-12">
                  <div class="col col-md-4 text-center">
                    <label class="control-label" style="margin-top:50px">Approve Reason</label>
                  </div>
                  <div class="col col-md-6">
                    <textarea class="form-control" rows="5" cols="50" name="approve_reason" id="approve_reason_input">
                      
                    </textarea>
                    <span class="text-danger" id="error_reason"></span>
                  </div>
                  
                </div>
              </div>
              <br />
        <div align="center">
             <button type="button" name="loan" id="loan_approve_btn" class="btn btn-success btn-lg">Approve Loan</button>
        </div>
        <br />

            </form>

          </div>

  
</div>
</section>
@endsection
