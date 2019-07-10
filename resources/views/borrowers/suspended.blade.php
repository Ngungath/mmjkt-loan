@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Suspended Borrower</a></li>
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
                    <a href="{{route('borrowers.restore',['id'=>$borrower->id])}}" class="badge bg-green">Restore</a>
                    <a href="{{route('borrower.delete',['id'=>$borrower->id])}}" class="badge bg-red" id="delete_borrower" >Delete</a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="6"><p class="text-center"><b>No borrower Found</b></p></td>
                </tr>
                @endif
            
              </tbody></table>
            </div>
            <!-- /.box-body -->
       
          </div>

</section>


@endsection