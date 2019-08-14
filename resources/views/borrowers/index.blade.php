@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        <a href="{{route('home')}}"> Dashboard</a>
        <small> > Borrower List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Borrower List</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Borrower List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-12"><table id="borrower_list" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">Full Name</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 125px;">Gender</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Unit</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 153px;">ID Number</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 212px;">Actions</th></tr>
                </thead>
                <tbody>

                   @foreach($borrowers as $borrower)

                <tr role="row" class="odd">
              
                  <td>{{$borrower->fname.' '.$borrower->mname.' '.$borrower->lname }}</td>
                  <td>{{$borrower->gender}}</td>
                  <td>{{$borrower->unit->name}}</td>
                  <td>{{$borrower->id_no}}</td>
                  <td>
                    @can('isAdmin')
                    <a href="{{route('borrowers.destroy',['id'=>$borrower->id])}}" class="badge bg-red">suspend</a>
                    @endcan
                    <a href="{{route('borrower.edit',['id'=>$borrower->id])}}" class="badge bg-green">update</a>
                    <a href="{{route('borrower.show',['id'=>$borrower->id])}}" class="fa fa-eye">View details</a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            
              </table></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>

</section>


@endsection