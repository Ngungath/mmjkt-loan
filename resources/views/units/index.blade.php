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
              <h3 class="box-title">JKT All Units</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered text-center">
                <tbody><tr>
                  <th>#</th>
                  <th>Unit Name</th>
                  <th>Unit Number</th>
                  <th>Actions</th>
                </tr>
                @if(count($units) > 0)
                @foreach($units as $unit)
                <tr>
                  <td>{{$unit->id}}</td>
                  <td>{{$unit->name}}</td>
                  <td>{{$unit->number}}</td>
                  <td>
                    @can('isAdmin')
                    <a href="{{route('unit.delete',['id'=>$unit->id])}}" class="badge bg-red">delete</a>
                    @endCan
                    <a href="{{route('unit.edit',['id'=>$unit->id])}}" class="badge bg-green">update</a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4"><p class="text-center"><b>No Unit Found</b></p></td>
                </tr>
                @endif
            
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-success clearfix text-center">
             {{$units->links()}}
            </div>
          </div>

</section>


@endsection