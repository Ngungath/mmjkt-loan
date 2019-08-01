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
      

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Lenders</h3>
             <a href="{{route('lender.create')}}">
              <button type="button" class="btn btn-default pull-right">
                Add Lender
              </button></a>
            </div>
           <!-- /.box-header -->

            <!-- Lender Table Start -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th style="width: 10px">#</th>
                  <th>Lender Name</th>
                  <th>Interest</th>
                  <th>Action</th>
                </tr>
                <?php $i = 1; ?>
                @foreach($lenders as $lender)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$lender->name}}</td>
                  <td>{{$lender->interest}}</td>
                  <td>
                  <a href="{{route('lender.edit',['id'=>$lender->id])}}"><button class="btn btn-primary btn-xs"> Edit</button></a>
                  <form action="{{route('lender.destroy',['id'=>$lender->id])}}" method="" id="lender-delete-form">
                  <button type="button" class="btn btn-danger btn-xs" onclick="delete_lender()">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
             {{$lenders->links()}}
              </ul>
            </div>
            <!-- Ender Lender Table -->
          </div>






    </section>
@endsection
<script type="text/javascript">
  function delete_lender(){
    if (confirm('Are you sure you want to delete the lender')) {
      $('#lender-delete-form').submit();
    }else{
      return false;
    }
  }
</script>