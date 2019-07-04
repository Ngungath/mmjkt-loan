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
    <button type="button" style="margin-top: 10px; margin-left: 10px"  class="btn btn-success" data-toggle="modal" data-target="#modal-success">
     Add Role
    </button>
            <div class="box-header with-border text-center"  style="margin-top: -15px";>
              <h3 class="box-title text-center"><b>Available Roles</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered text-center">
                <tbody><tr>
                  <th>#</th>
                  <th>Role Name</th>
                   <th>Actions</th>
                </tr>
                @foreach($roles as $role)
                <tr>
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  
                  <td>
                    <a href="{{route('roles.delete',['id'=>$role->id])}}" class="badge bg-red">delete</a>
                    <a href="{{route('roles.edit',['id'=>$role->id])}}">
                      <button type="button" class="badge bg-green">
                       Edit Role
                      </button>
                    </a> 
                  </td>
                </tr>
                @endforeach
              
            
              </tbody></table>
            </div>
          <!-- /.box-body -->
            <div class="box-footer clearfix text-center">
             {{$roles->links()}}
            </div>
          </div>


        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Role</h4>
              </div>
              <div class="modal-body">
                            <!-- form start -->
             <form role="form" method="post" action="{{route('roles.store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="unitName">Role Name</label>
                  <input type="text" class="form-control" id="rname" name="rname" placeholder="Enter Role Name">
                </div>
              <!-- /.box-body -->
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline pull-left">Store Role</button>
              </div>
               </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
        <!-- /.modal -->


  
   
</section>



@endsection