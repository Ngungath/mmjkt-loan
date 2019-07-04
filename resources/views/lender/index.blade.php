@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All Lenders</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Lenders</h3>
              <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-lender">
                Add Lender
              </button>
            </div>
           <!-- /.box-header -->

            <!-- Lender Table Start -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th>Label</th>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><button class="btn btn-primary btn-xs" onclick="Load_lender_table()">Edit</button></td>
                </tr>
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
            <!-- Ender Lender Table -->
          </div>




<!-- Lender Modal start -->
          <div class="modal fade" id="modal-lender">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /End lender modal -->


    </section>
@endsection