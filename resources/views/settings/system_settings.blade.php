@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
      	<a href="{{route('home')}}">
        Dashboard
        </a>
        <small> > System Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Create Role</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
 	<div class="box box-success">
<div class="" style="margin-top: 10px;">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">General Settings</a></li>
              <li><a href="#tab_2" data-toggle="tab">User Roles</a></li>
              <li><a href="#tab_3" data-toggle="tab">Loan Settings</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <form method="post" action="{{route('system_setings.update')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                <div class="form-group">
                  <label class="label-control">Update Logo</label>
                  <div class="form-control">
                    <input type="file" name="logo" id="logo">
                  </div>
                </div>
                 <div class="form-group">
                 <button type="submit" class="btn btn-success">Update Settings</button>
                </div>
                 </form>
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
     </div>

</section>
@endsection
