@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All Roles</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content">
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Loans</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Borrower</th>
                  <th>Loan Amount</th>
                  <th >Loan Type</th>
                  <th >Status</th>
                  <th>Actions</th>
                </tr>
                <?php $id = 1?>
                @foreach($loans as $loan)
                <?php $borrower = App\Borrower::find($loan->borrower_id);?>
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{ucfirst($borrower->fname).' '.ucfirst($borrower->lname)}}</td>
                  <td>{{$loan->loan_amount}}</td>
                  <td>{{$loan->loan_type}}</td>
                  @if($loan->loan_status == "Pending")
                  <td><span class="badge bg-blue">{{$loan->loan_status}}</span></td>
                  @elseif($loan->loan_status == "Declined")
                  <td><span class="badge bg-red">{{$loan->loan_status}}</span></td>
                  @elseif($loan->loan_status == "Approved")
                  <td><span class="badge bg-green">{{$loan->loan_status}}</span></td>
                  @endif
                  
                  <td>
                    <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @if($loan->loan_status != "Approved")
                    <li><a href="#">Approve Loan</a></li>
                    @endif
                    <li><a href="#">Suspend Loan</a></li>
                    <li><a href="#">Edit Loan</a></li>
                    <li><a href="#">Delete Loan</a></li>
                  </ul>
                </div>
                  </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{$loans->links()}}
              </ul>
            </div>
          </div>
  
   
</section>



@endsection