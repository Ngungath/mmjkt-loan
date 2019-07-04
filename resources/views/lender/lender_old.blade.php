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
	<div class="box">
    <button type="button" style="margin-top: 10px; margin-left: 10px"  class="btn btn-success" data-toggle="modal" data-target="#modal-success">
     Add Lender 
    </button>
            <div class="box-header with-border text-center"  style="margin-top: -15px";>
              <h3 class="box-title text-center"><b>Available Lenders</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered text-center" id="lender_table">
                <tbody><tr>
                  <th>#</th>
                  <th>Lender Name</th>
                   <th>Actions</th>
                </tr>
                {{$i=1}}
               @foreach($lenders as $lender)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$lender->name}}</td>
                  <td>
                    <button class="btn btn-danger btn-xs" onclick="deleteData('{{$lender->id}}')">delete </button>
                    <a href="#">
                      <button type="button" onclick="editData('{{$lender->id}}')" class="btn btn-success btn-xs">
                       Edit Role
                      </button>
                    </a> 
                  </td>
                </tr>
                @endforeach
              
              
            
              </tbody></table>
            </div>
          <!-- /.box-body -->
            <div class="box-footer clearfix text-center">
             
            </div>
          </div>


        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Lender</h4>
              </div>
              <div class="modal-body">
                            <!-- form start -->
             <form role="form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="unitName">Lender Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter lender Name">
                </div>
              <!-- /.box-body -->
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                <button type="button" id="ajaxSubmit" class="btn btn-outline pull-left">Store Lender</button>
              </div>
               </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
        <!-- /.modal -->


   
</section>
