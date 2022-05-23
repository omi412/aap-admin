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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Pending Approval</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="volunter_list">
    <div class="row">
    <div class="col-lg-12">
      <div class="card pen_appr">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Pending Approvals
        </div>
        <div class="card-body">
          <div class="search_box">
            <div class="input-group">
              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <table class="table table-striped responsive all_table">
            <thead>
              <tr>
                <th>S No.</th>
                <th>Name</th>
                <th style="text-align: right;">Number</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="#" data-toggle="modal" data-target="#form">01</a></td>
                <td><a href="#" data-toggle="modal" data-target="#form">Sachin saxena</a></td>
                <td style="text-align: right;"><a href="#" data-toggle="modal" data-target="#form">
                  6352147890</a>
                </td>
              </tr>
              <tr>
                <td><a href="#" data-toggle="modal" data-target="#form">02</a></td>
                <td><a href="#" data-toggle="modal" data-target="#form">Ashok Sharma</a></td>
                <td style="text-align: right;"><a href="#" data-toggle="modal" data-target="#form">
                  7896541230</a>
                </td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>

  <div class="modal fade pending_approval" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Pending Approval</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-md-3">
              <label for="name">Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Sachin saxena" readonly>
            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Number</label>
            </div>
            <div class="col-md-9">
              <input type="number" class="form-control" id="number" placeholder="6352147890" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Approval</label>
          </div>
          <div class="col-md-9">
            <!-- <input type="text" class="form-control" id="approval" placeholder="Approval"> -->
            <select name="approval" class="form-control">
                  <option>Select Approval</option>
                  <option>Approved</option>
                  <option>Rejected</option>
                </select>
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Designation</label>
          </div>
          <div class="col-md-9">
            <select name="approval" class="form-control">
            <option>Ward Prabhari</option>
            <option>Mandal Prabhari</option>
            <option>Both Prabhari</option>
            <option>Gali Prabhari</option>
          </select>
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Manager</label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control" id="manager" placeholder="Manager">
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
