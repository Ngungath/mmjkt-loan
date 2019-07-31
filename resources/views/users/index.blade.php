@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        <a href="{{route('home')}}">
        Dashboard
        </a>
        <small> > Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All Users</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content">
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">JKTLM Users</h3>
              <a href="{{route('user.create')}}"><button class="btn btn-success pull-right">Add New User</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered text-center">
                <tbody><tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    <a href="{{route('user.destroy',['id'=>$user->id])}}" class="badge bg-red">delete</a>
                    <a href="{{route('user.edit',['id'=>$user->id])}}" class="badge bg-green">update</a>
                  </td>
                </tr>
                @endforeach
            
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-center">
             {{$users->links()}}
            </div>
          </div>

</section>


@endsection