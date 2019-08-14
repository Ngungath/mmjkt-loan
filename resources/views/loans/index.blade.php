@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
       <a href="{{route('home')}}">Dashboard</a>
        <small> > All Loans</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All Loans</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content">
	<div class="box box-success">
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
                @if($loan->borrower)
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{$loan->borrower->fname}}</td>
                  <td>{{$loan->loan_amount}}</td>
                  <td>{{$loan->loan_type}}</td>
                  @if($loan->loan_status == "Pending")
                  <td><span class="badge bg-orange">{{$loan->loan_status}}</span></td>
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
                    @can('isAdmin')
                    @if($loan->loan_status != "Approved")
                    <li><a href="{{route('loan.wiew_approve',['id'=>$loan->id])}}">Approve Loan</a></li>
                    @endif
                    @endcan
                    <li><a href="{{route('loan_payment.single',['id'=>$loan->id])}}">Add Payment</a></li>
                    @can('isAdmin')
                    @if($loan->loan_status != "Approved")
                    <li><a href="{{route('loan.edit',['id'=>$loan->id,'borrower_id'=>$loan->borrower->id])}}">Edit Loan</a></li>
                    @endif
                    @endcan
                    <li class="divider"></li>
                    <li><a href="{{route('loan.show',['id'=>$loan->id])}}">Preview Loan</a></li>
                  </ul>
                </div>
                  </td>
                </tr>
                @endif
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