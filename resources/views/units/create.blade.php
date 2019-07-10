@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Create Units</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Unit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/units/store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="unitName">Unit Name</label>
                  <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Unit unitName">
                </div>
                <div class="form-group">
                  <label for="unitNamber">Unit Number</label>
                  <input type="text" class="form-control" id="unumber" name="unumber" placeholder="Enter Unit Number">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-success">Save Unit</button>
              </div>
            </form>

          </div>

  
</div>
</section>
@endsection
