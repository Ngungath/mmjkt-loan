@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Edit Unit</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Unit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('units.update',['id'=>$unit->id])}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="unitName">Unit Name</label>
                  <input type="text" class="form-control" value="{{$unit->name}}" id="uname" name="uname" placeholder="Enter Unit unitName">
                </div>
                <div class="form-group">
                  <label for="unitNamber">Unit Number</label>
                  <input type="text" class="form-control" value="{{$unit->number}}" id="unumber" name="unumber" placeholder="Enter Unit Number">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update unit</button>
              </div>
            </form>

          </div>

  
</div>
</section>
@endsection
