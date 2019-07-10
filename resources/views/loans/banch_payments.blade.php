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
                  <td><input type="checkbox" name="amount[]"></td>
                  
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
                  <option value="2019">2019</option>
                  <option value="2019">2020</option>
                  <option value="2019">2021</option>                
                </select>
              </div>
            </div>
              <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Select Month</label>
                <select class="form-control" name="year" id="year">
                  <option value="2019">January</option>
                  <option value="2019">February</option>
                  <option value="2019">March</option>                
                </select>
              </div>
            </div>
            <div class="col-md-4">
                 <div class="form-group">
          
                  <button type="submit" style="margin-top: 25px" class="btn btn-success">Make Payment</button>
                  <br>

              </div> 
                <div class="form-group pull-right" style="margin-right:100px; margin-top: -45px">
                  <label class="label-control">Select All</label>
                  <input type="checkbox" name="select_all">
              </div> 
            </div>
            </div>
            </div>
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{$loans->links()}}
              </ul>
            </div>
          </div>
   
</section>



@endsection