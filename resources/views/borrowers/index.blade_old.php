@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All Units</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content">
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Borrowers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered text-center">
                <tbody><tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Loan Number</th>
                  <th>Mobile</th>
                  <th>Actions</th>
                </tr>
                @if(count($borrowers) > 0)
                @foreach($borrowers as $borrower)
                <tr>
                  <td>{{$borrower->id}}</td>
                  <td>{{$borrower->fname.' '.$borrower->mname.' '.$borrower->lname }}</td>
                  <td>{{$borrower->gender}}</td>
                  <td>{{$borrower->mob_number}}</td>
                  <td>{{$borrower->loan_number}}</td>
                  <td>
                    <a href="#" class="badge bg-red">delete</a>
                    <a href="#" class="badge bg-green">update</a>
                    <a href="#" class="fa fa-eye">View details</a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4"><p class="text-center"><b>No borrower Found</b></p></td>
                </tr>
                @endif
            
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-center">
             {{$borrowers->links()}}
            </div>
          </div>

</section>


@endsection