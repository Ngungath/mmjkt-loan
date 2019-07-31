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
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Create New User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form method="post" action="{{ route('user.store') }}">
          <div class="box-body">
            {!! csrf_field() !!}

            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="label-control">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                <span class="fa fa-user form-control-feedback"></span>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="label-control">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
              <label class="label-control">User Type</label>
              <select class="form-control" name="user_type">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
              </select>
              
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="label-control">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="fa fa-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label class="label-control">Confirm password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                <span class="fa fa-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
          </div>
         <div class="box-footer text-center">
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Register User</button>
                </div>
                <!-- /.col -->
            </div>
          </div>
        </form>
       </div>
     </section>
@endsection
