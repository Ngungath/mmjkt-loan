@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Create Role</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('roles.store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="unitName">Role Name</label>
                  <input type="text" class="form-control" id="rname" name="rname" placeholder="Enter Role Name">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>

  
</div>
</section>
@endsection
