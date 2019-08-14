@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
       <a href="{{route('home')}}"> Dashboard</a>
        <small> > Loan Report</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Loan Reports</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <section class="content">
   <div class="box box-success" style="display: none;">
            <div class="box-header with-border">
              <span class="fa fa-filter"></span><h3 class="box-title">Filters</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <form method="post" action="{{route('loan_report.find')}}">
                  {{csrf_field()}}
                 <input type="hidden" name="raw" value="raw">
                <div class="col col-md-12 text-center" >
                  <div class="col-md-8">
                    <label class="Control-label">Select Units:</label>
                    <?php $units = App\Unit::all() ?>
                    <select class="form-control" name="unit" id="">
                      @foreach($units as $unit)
                      <option value="{{$unit->id}}">{{$unit->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col col-md-5" style="display: none;">
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
              <span class="fa fa-book"></span><h3 class="box-title">Loan report by Lender</h3>
              
                 
                 <button class="btn btn-primary pull-right" style="margin-top: 0px">PDF Priview</button>
               
        
            </div>
            <div class="box-body">
              <div class="row">
             <div class="col-xs-12">
          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="table-loan-report" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">SN</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Lender Name</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Total Loan</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Payment</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Due Amount</th></tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                @foreach($lenders as $lender)
                  <tr role="row" class="odd">
                  <td class="sorting_1">{{$i++}}</td>
                  <td>{{$lender->name}}</td>
                  <td>
                    <?php 
                    $total_loan = App\Loan::where('lender_id',$lender->id)
                                ->where('loan_status','Approved')
                                ->where('active',true)
                                ->sum('loan_amount');

                     ?>
                    {{number_format($total_loan)}}
                  </td>
                  <td>
                    <?php
                    $total_payment = App\Payment::where('lender_id',$lender->id)
                                 ->where('active',true)
                                ->sum('payement_amount');

                     ?>
                    {{number_format($total_payment)}}
                  </td>
                  <td>{{number_format(($total_loan-$total_payment))}}</td>
                </tr>
                @endforeach
            </tbody>
              </table></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         </div>
        </div>
            <!-- /.box-body -->
          </div>
  
      </section>
@endsection
