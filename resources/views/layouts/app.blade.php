<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>JKTLM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-toggle.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('css/_all.css')}}">
     <!-- toastr-->
     <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
     <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/tab.css')}}">
    {{-- SweetAlert2 --}}
      <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
      <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

      <!-- Datatables  -->
       <link rel="stylesheet" href="{{asset('datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <style type="text/css">
 .active_tab1
  {
   background-color:#fff;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
  }
    .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  .required2{
    color: red;
  }
    </style>

    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>JKTLM</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{asset('img/jkt.jpg')}}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{asset('img/jkt.jpg')}}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © {{date('Y')}} <a href="#">JKT</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 3.1.1 -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/adminlte.min.js')}}"></script>
    <!-- Toastr-->
   
    <script src="{{asset('js/toastr.min.js')}}"></script>
     <!-- Date picker-->
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
  

    <script src="{{asset('js/icheck.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <!-- Datatable js -->
    <script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- Datatable js -->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/main2.js')}}"></script>
    <script type="text/javascript">
        @if(Session::has('success')){
          
          toastr.success("{{Session::get('success')}}");

        }@elseif(Session::has('warning')){
          toastr.warning("{{Session::get('warning')}}");  
        }

        @endif

        //date picker
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    
     $('#doe').datepicker({
      autoclose: true
    })
    
     $('#rod').datepicker({
      autoclose: true
    })
      $('#application_date').datepicker({
      autoclose: true
    })
  })

  //Datatable 
 
    </script>
    <script type="text/javascript">     
   $(function () {
    $('#table-payment').DataTable({
      'paging'      :true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });
    $('#table-loan').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
    </script>


    @yield('scripts')
</body>
</html>