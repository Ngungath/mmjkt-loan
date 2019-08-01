@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> New Lenders</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Role</h3>
            </div>
      
              <form method="post" action="{{route('lender.store')}}">
                {{csrf_field()}}
              <div class="modal-body">
                <div class="form-group">
                  <label class="label-control">Lender Name</label>
                  <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                  @if($errors->has('name'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                <label class="label-control">Lender Interest</label>
               <input type="number" name="interest" value="{{old('interest')}}" id="interest" class="form-control">
                 @if($errors->has('interest'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('interest') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
           
         
         

</div>
    </section>
@endsection
