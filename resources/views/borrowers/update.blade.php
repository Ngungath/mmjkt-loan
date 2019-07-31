@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All Units</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content">
   <form role="form" id="borrower_update_form" method="post" action="{{route('borrower.update',['id'=>$borrower->id])}}" enctype="multipart/form-data">  
	<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="nav-item active" id="borrower_personal_detail_tab"><a class="nav-link" href="#tab_1" id="borrower_personal_detail" data-toggle="tab"><b style="color: red">SECTION 1 :</b> Personal Details</a></li>
              <li class="nav-item" id="employment_detail_tab"><a class="nav-link inactive_tab1" id="employment_detail" id="employement_detail"><b style="color: red">SECTION 2 :</b> Employment Details</a></li>
            </ul>
         
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
             
              {{csrf_field()}}
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">First Name <span class="required2">*</span></label>
                    <input type="text" name="fname" id="fname" value="{{$borrower->fname}}" class="form-control">
                    <span id="fname_error" class="text-danger"></span>
                    </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Middle Name</label>
                    <input type="text" name="mname" value="{{$borrower->mname}}" class="form-control">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Last Name <span class="required2">*</span></label>
                    <input type="text" name="lname" id="lname" value="{{$borrower->lname}}" class="form-control">
                    <span class="text-danger" id="lname_error"></span>
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
                  <input type="text" class="form-control pull-right" name="dob" value="{{$borrower->dob}}" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Place of Birth</label>
                    <input type="text" name="place_birth" value="{{$borrower->place_birth}}" class="form-control">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Computer No.</label>
                    <input type="text" name="comp_number" value="{{$borrower->comp_number}}" class="form-control">
                    </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                   <div class="form-group">
               <label>Staff ID No. (Card Serial Number)</label>
                   <input type="text" name="id_number" value="{{$borrower->id_no}}" class="form-control">
              </div>
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Mobile Phone Number</label>
                    <input type="text" name="mob_number" value="{{$borrower->mob_number}}" class="form-control">
                    </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                    <label class="control-label">Home Phone Number</label>
                    <input type="text" name="hom_number" value="{{$borrower->hom_number}}" class="form-control">
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
                   <input type="text" name="bank_acc_number" value="{{$borrower->bank_acc_number}}" class="form-control">
                 </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                    <label class="control-label">Bank Branch</label>
                    <input type="text" name="bank_branch" value="{{$borrower->bank_branch}}" class="form-control">
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
              <!-- Button nex borrower details -->
                <br />
                <div align="center">
                  <button type="button" name="btn_update_personal_detail" id="btn_update_personal_detail" class="btn btn-info btn-lg">Next >>>></button>
                      </div>
              <!-- Button nex borrower details -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane fade" id="tab_2">
                 <!-- /.tab-pane -->
              <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-6">
                   <div class="form-group">
                       <label>Barack Name <span class="required2"> *</span></label>
                       <?php $units = App\Unit::all() ?>
                          <select class="form-control" name="unit_id" id="barack_name">
                        @foreach($units as $unit)
                         <option value="{{$unit->id}}">{{$unit->name}}</option>
                      @endforeach
                    </select>
                       <span class="text-danger" id="barack_name_error"></span>
                <!-- /.input group -->
              </div>
                  </div>
                
                    <div class="col-md-6">
                       <div class="form-group">
                    <label class="control-label">Location</label>
                    <input type="text" name="barack_location" value="{{$borrower->location}}" class="form-control">
                    </div>
                    </div>
                </div>
              </div>
                  <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-4">
                   <div class="form-group">
                       <label>Date of Employment</label>

                      <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" value="{{$borrower->doe}}" name="doe" id="doe" placeholder="DOE">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                    <div class="col-md-4">
                   <div class="form-group">
                       <label>Date of Retirement</label>

                      <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text"  class="form-control pull-right" name="rod" value="{{$borrower->rod}}" id="rod" placeholder="ROD">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Job Rank<span class="required2"> *</span></label>
                    <input type="text" name="rank" id="rank" value="{{$borrower->rank}}" class="form-control">
                    <span class="text-danger" id="rank_error"></span>
                    </div>
                    </div>
                </div>
              </div>

                <div class="row">
                <div class="col col-md-12">
                  <div class="col-md-6">
                   <div class="form-group">
                    <label>Monthly Basic Salary</label>
                    <input type="text" name="monthly_basic_salary" id="monthly_basic_salary" value="{{$borrower->monthly_basic_salary}}" class="form-control">
                    <span class="text-danger" id="monthly_basic_salary_error"></span>
                  </div>
                  </div>
               
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Monthly Net Salary</label>
                    <input type="text" name="monthly_net_salary" id="monthly_net_salary" value="{{$borrower->monthly_net_salary}}" class="form-control">
                    <span class="text-danger" id="monthly_net_salary_error"></span>
                    </div>
                    </div>
                </div>
              </div>
                <br />
        <div align="center">
        <br />
        <div align="center">
        <button type="button" name="previous_btn_personal_details" id="previous_btn_update_borrower_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_update_employment_details" id="btn_update_employment_details" class="btn btn-success btn-lg">Update Borrower</button>
        </div>
        <br />
        </div>
        <br />
        </div>
        </div>
        <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
           </form>
</section>


@endsection