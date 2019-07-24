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
	<div class="box box-success">
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
                  <th>Unit</th>
                  <th>Mobile</th>
                  <th>Actions</th>
                </tr>
                <?php $i=1; ?>
                @if(count($borrowers) > 0)
                @foreach($borrowers as $borrower)

                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$borrower->fname.' '.$borrower->mname.' '.$borrower->lname }}</td>
                  <td>{{$borrower->gender}}</td>
                  <td>{{$borrower->unit->name}}</td>
                  <td>{{$borrower->mob_number}}</td>
                  <td>
                    <a href="{{route('borrowers.destroy',['id'=>$borrower->id])}}" class="badge bg-red">suspend</a>
                    <a href="#" class="badge bg-green">update</a>
                    <a href="{{route('borrower.show',['id'=>$borrower->id])}}" class="fa fa-eye">View details</a>
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