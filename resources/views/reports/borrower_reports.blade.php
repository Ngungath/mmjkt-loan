@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Borrower Reports</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
   <div class="box box-success">
            <div class="box-header with-border">
              <span class="fa fa-filter"></span><h3 class="box-title">Filters</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <form method="post" action="{{route('borrowers_report.find')}}">
                  {{csrf_field()}}
                <div class="col col-md-12">
                  <div class="col-md-5">
                    <label class="Control-label">Units:</label>
                    <?php $units = App\Unit::all() ?>
                    <select class="form-control" name="unit" id="">
                      @foreach($units as $unit)
                      <option value="{{$unit->id}}">{{$unit->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col col-md-5">
                    <label class="Control-label">Lender:</label>
                  <?php $lenders = App\Lender::all() ?>
                    <select class="form-control" name="lender" id="">
                      @foreach($lenders as $lender)
                      <option value="{{$lender->id}}">{{$lender->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col col-md-2">
                  <button class="btn btn-primary" style="margin-top: 25px">Fillter</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
           
           <!-- Data available -->

          <div class="box box-success">
            <div class="box-header with-border">
              <span class="fa fa-book"></span><h3 class="box-title">Borrowers Information</h3>
              <a class="btn btn-primary pull-right" href="{{route('borrowers_report.pdf')}}" target="blank">PDF Priview</a>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col col-md-12">

                  <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Borrower Name</th>
                  <th>Unit</th>
                  <th>Lender</th>
                  <th>Due Amount</th>
                </tr>
                @if(isset($borrowers) && count($borrowers) > 0)

                @foreach($borrowers as $borrower)
                <?php
                $payments = \App\Http\Controllers\RepoprtsController::get_borrowers_payments($borrower_id,$loan_id,$lender_id)
                ?>
                <tr>
                  <td>1.</td>
                  <td>{{$borrower->fname}}</td>
                  <td>Ruvu</td>
                  <td>CRDB</td>
                  <td>500000</td>
                </tr>
                @endforeach
                @else
               <tr>
                  <td colspan="5"><p class="text-center">No data available</p></td>
                </tr>
                @endif
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
               
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
  
      </section>
@endsection
