@extends('layouts.app')
 
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>   Add Borrower</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

      <section class="content">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Borrower</h3>
            </div>
            <div style="padding:10px; color: red">
              <p><b>SECTION 1 :</b> Personal Details</p>  
            </div>
            <form role="form" method="post" action="{{route('borrower.store')}}">
              {{csrf_field()}}
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-8">
                    <label class="control-label">Loan Application Number :</label>
                    <input type="text" name="loan_number" class="form-control">
                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Type of Loan</label>
                    <select class="form-control" name="loan_type">
                     <option>New</option>
                     <option>Top Up</option>
                   </select>
                    </div>
                   </div>

                </div>
              </div>
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input type="text" name="fname" class="form-control">
                    </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Middle Name</label>
                    <input type="text" name="mname" class="form-control">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="lname" class="form-control">
                    </div>
                    </div>
                </div>
              </div>
         
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                   <div class="form-group">
                       <label>Date of Birth</label>

                      <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="dob" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Place of Birth</label>
                    <input type="text" name="place_birth" class="form-control">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Computer No.</label>
                    <input type="text" name="comp_number" class="form-control">
                    </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                   <div class="form-group">
               <label>Staff ID No. (Card Serial Number)</label>
                   <input type="text" name="id_number" class="form-control">
              </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Mobile Phone Number</label>
                    <input type="text" name="mob_number" class="form-control">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Home Phone Number</label>
                    <input type="text" name="hom_number" class="form-control">
                    </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                   <div class="form-group">
                   <label>Gender</label>
                   <select class="form-control" name="gender">
                     <option>Male</option>
                     <option>Female</option>
                   </select>
              </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                   <label>Contract Status</label>
                   <select class="form-control" name="contract_status">
                     <option>Parmanent</option>
                     <option>Temporary</option>
                   </select>
                    </div>
                   </div>
                    <div class="col-md-4">
                    <div class="form-group">
                  <label>Receive Salary Through</label>
                   <select class="form-control" name="salary_bank">
                     <option>NMB</option>
                     <option>CRDB</option>
                     <option>PBZ</option>
                   </select>
                    </div>
                    </div>
                </div>
              </div>
            <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                   <div class="form-group">
                     <label>Account Number</label>
                   <input type="text" name="bank_acc_number" class="form-control">
                 </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                    <label class="control-label">Bank Branch</label>
                    <input type="text" name="bank_branch" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                     <div class="form-group">
                    <label class="control-label">Applicant Photo</label>
                    <input type="file" name="applicant_photo" class="form-control">
                    </div>
                    </div>
                   
                </div>
              </div>
              <div style="padding:10px; color: red">
              <p><b>SECTION 2 :</b> Employment Details</p>  
            </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>

  
</div>
</section>
@endsection
