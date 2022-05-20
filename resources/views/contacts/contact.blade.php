@extends('layouts/master')
@section('head')

@endsection
@section('content')
        
        <!--**********************************
            Content body start
        ***********************************-->

<cui-breadcrumb>
  <ol class="breadcrumb">
    <li class="breadcrumb-item" ng-reflect-ng-class="[object Object]">
      <a ng-reflect-router-link="/" href="#/">Home</a>
    </li>
    <li class="breadcrumb-item active" ng-reflect-ng-class="[object Object]">
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Contacts</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list">
    <div class="row"  id="section_first">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add Contact</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i>Contact List
        </div>
        <div class="card-body contact">
           <div class="search_box">
            <div class="input-group">
              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <table class="table table-striped responsive all_table" id="table">
            <thead>
              <tr>
                <th style="width: 70px;">S No.</th>
                <th style="width: 110px;">User Type</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <!-- <th style="text-align: right;">Action</th> -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="/#/edit-contact">1</a></td>
                <td><a href="/#/edit-contact">Public</a></td>
                <td><a href="/#/edit-contact">Vishal Saxena</a></td>
                <td><a href="/#/edit-contact">28</a></td>
                <td><a href="/#/edit-contact">Male</a></td>
                <td><a href="/#/edit-contact">Narwana Rd, I.P.Extension, West Vinod Nagar, New Delhi, Delhi 110092 </a></td>

               <!--  <td style="text-align: right;"><a href="/#/edit-contact">
                  <i class="fa fa-edit" style="color:#0072b0"></i></a>
                </td> -->
              </tr>
              <tr>
                <td><a href="/#/edit-contact">2</a></td>
                <td><a href="/#/edit-contact">Volunteer</a></td>
                <td><a href="/#/edit-contact">Amit Sharma</a></td>
                <td><a href="/#/edit-contact">35</a></td>
                <td><a href="/#/edit-contact">Male</a></td>
                <td><a href="/#/edit-contact">133, South Avenue, New Delhi, Delhi-110001 </a></td>

               <!--  <td style="text-align: right;"><a href="/#/edit-contact">
                  <i class="fa fa-edit" style="color:#0072b0"></i></a>
                </td> -->
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
  </div><!--/.row-->
    <div class="row"  id="section_second" style="display: none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-primary"><i class="fa fa-list" style="margin-right: 6px;"></i>Contact List</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i>Add Contact
        </div>
        <div class="card-body pending_approval">
          <form>
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">First Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="firstname" aria-describedby="firstname" placeholder="First Name">
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Last Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Gender</label>
              </div>
              <div class="col-md-9">
                <select class="form-control">
                    <option>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Age</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" id="age" placeholder="Enter Age">
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">User Type</label>
              </div>
              <div class="col-md-9">
                <select class="form-control">
                    <option value="0" selected>Public</option>
                    <option value="1">Volunteer</option>
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">House</label>
              </div>
              <div class="col-md-9">
                <select class="form-control">
                    <option value="0">Select House</option>
                    <option value="1">Narwana Rd, I.P.Extension, West Vinod Nagar, New Delhi, Delhi 110092</option>
                    <option value="2">133, South Avenue, New Delhi, Delhi-110001</option>
                    <option value="3">9, Pandit Pant Marg, New Delhi - 110001 </option>
                </select>
              </div>
              </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>


@endsection

@section('script')

<script>
  
  $("#show_second").click(function(){
    $("#section_first").hide();
    $("#section_second").show();
  });

  $("#show_first").click(function(){
    $("#section_second").hide();
    $("#section_first").show();
  });

</script>
@endsection
