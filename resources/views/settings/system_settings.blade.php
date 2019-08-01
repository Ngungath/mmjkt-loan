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
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                
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
