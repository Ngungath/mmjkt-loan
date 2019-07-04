@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Create Units</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
<div class="box box-primary">
            <h2>Register Form</h2>
            <div class="row col-md-5">
            	<button type="button" class="btn btn-warning" id="getRequest">Get Request</button>
            	
            </div>
            <p id="getData"></p>
     <form >

  

            <div class="form-group">

                <label>Name:</label>

                <input type="text" name="name" class="form-control" placeholder="Name" required="">

            </div>

  

            <div class="form-group">

                <label>Password:</label>

                <input type="password" name="password" class="form-control" placeholder="Password" required="">

            </div>

   

            <div class="form-group">

                <strong>Email:</strong>

                <input type="email" name="email" class="form-control" placeholder="Email" required="">

            </div>

   

            <div class="form-group">

                <button class="btn btn-success btn-submit">Submit</button>

            </div>

  

        </form>

  
</div>
</section>


@endsection
