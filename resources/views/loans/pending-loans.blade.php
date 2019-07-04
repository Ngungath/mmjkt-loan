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
                  @elseif($loan->loan_status == "")
                  @elseif($loan->loan_status == "")
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
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
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