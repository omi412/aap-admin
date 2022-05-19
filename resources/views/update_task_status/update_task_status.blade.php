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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Update Task Status</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="volunter_list tasks">
    <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Update Task Status
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
                <th style="width: 70px;">S No.</th>
                <th>Task Title</th>
                <th>Address</th>
                <th>Volunteer Name</th>
                <th style="text-align: right;">To Be started</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="{{ url('add-assign') }}">1</a></td>
                <td><a href="{{ url('add-assign') }}">Add new ward prabhari</a></td>
                <td><a href="{{ url('add-assign') }}">Narwana Rd, I.P.Extension, West Vinod Nagar, New Delhi, Delhi 110092</a></td>
                <td><a href="{{ url('add-assign') }}">Ramesh Sharma</a></td>
                <td style="text-align: right;"><a href="{{ url('add-assign') }}">
                  <span class="badge badge-success">In Progress</span></a>
                </td>
              </tr>
              <tr>
                <td><a href="{{ url('add-assign') }}">2</a></td>
                <td><a href="{{ url('add-assign') }}">Add new Mandal prabhari</a></td>
                <td><a href="{{ url('add-assign') }}">133, South Avenue, New Delhi, Delhi-110001</a></td>
                <td><a href="{{ url('add-assign') }}">Meenakshi Jain</a></td>
                <td style="text-align: right;"><a href="{{ url('add-assign') }}">
                  <span class="badge badge-danger">Complete</span></a>
                </td>
              </tr>
              <tr>
                <td><a href="{{ url('add-assign') }}">3</a></td>
                <td><a href="{{ url('add-assign') }}">Add new Booth prabhari</a></td>
                <td><a href="{{ url('add-assign') }}">153, South Avenue, New Delhi, Delhi-110001</a></td>
                <td><a href="{{ url('add-assign') }}">Rahul Garg</a></td>
                <td style="text-align: right;"><a href="{{ url('add-assign') }}">
                  <span class="badge badge-success">In Progress</span></a>
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


  <div class="modal fade pending_approval" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
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
              <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Number</label>
            </div>
            <div class="col-md-9">
              <input type="number" class="form-control" id="number" placeholder="Number">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Approve</label>
          </div>
          <div class="col-md-9">
            <!-- <input type="text" class="form-control" id="approval" placeholder="Approval"> -->
            <select name="approval" class="form-control">
                  <option>Select Approval</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Degisnation</label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control" id="degisnation" placeholder="Degisnation">
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
@endsection