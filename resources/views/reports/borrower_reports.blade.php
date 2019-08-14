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
                 <input type="hidden" name="raw" value="raw">
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
              <form method="post" target="_blank" action="{{route('borrowers_report.find')}}">
                  {{csrf_field()}}
                 <input type="hidden" name="pdf" value="pdf">
                 @if(isset($lender_id))
                 <input type="hidden" name="lender" value="{{$lender_id}}">
                 <input type="hidden" name="unit" value="{{$unit_id}}">
                  @endif
                 <button class="btn btn-primary pull-right" style="margin-top: -20px">PDF Priview</button>
               </form>
        
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col col-md-12">

          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="table-borrower-report" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Borrower Name</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Unit</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Lender</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Loan Amount</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Due Amount</th></tr>
                </thead>
                <tbody>
                @if(isset($borrowers) && count($borrowers) > 0)
                  <?php
                  $unit_name = $unit_name;
                  $lender_name = $lender_name;
                  $i=1;
                  ?>
                @foreach($borrowers as $borrower)
                <?php
                $total_payment = get_borrowers_payments($borrower->borrower_id,$borrower->id,$borrower->lender_id);
                //dd($borrower->id);
              //dd($total_payment);
              
                ?>
                <tr>
                 
                  <td>{{$borrower->fname.' '.$borrower->lname}}</td>
                  <td>{{$unit_name}}</td>
                  <td>{{$lender_name}}</td>
                  <td>{{$borrower->loan_amount}}</td>
                  <td>{{$borrower->loan_amount - $total_payment}}</td>
                </tr>
                @endforeach
                @else
               <tr>
                  <td colspan="5"><p class="text-center">No data available</p></td>
                </tr>
                @endif
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
