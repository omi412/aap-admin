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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Role Detail</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="row" *ngIf="(activeUser=='admin')">
    <div class="col-md-12">
      @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
        </div>
      @endif
      <div class="card volunter">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="{{ url('role-details') }}" id="show_second" class="btn btn-outline-primary"><i class="fa fa-list" style="margin-right: 6px;"></i> Role Deatils</a>
            </div>
          </div>
        <div class="card-header">
         <i class="fa fa-align-justify"></i> Role Detail
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-sm-6 col-lg-12">
            <div class="volunter_add messaging">
                <form id="messaging-form" action="{{ route('role-details.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">User Name</label>
                    </div>
                    <div class="col-md-9">
                      <!-- <input type="text" name="user_name" required id="user_name" class="user_name" placeholder="User Name"> -->
                      <select name="user_name">
                        <option value=>Select User Name</option>
                        <option value="1">vishal</option>
                        <option value="2">anil</option>
                        <option value="3">amit</option>
                        <option value="4">vikash</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Manager</label>
                    </div>
                    <div class="col-md-9">
                      <!-- <input type="text" name="user_name" required id="user_name" class="user_name" placeholder="User Name"> -->
                      <select name="manager_name">
                        <option value=>Select Manager Name</option>
                        <option value="1">vishal</option>
                        <option value="2">anil</option>
                        <option value="3">amit</option>
                        <option value="4">vikash</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Name</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="name" required id="name" class="name" placeholder="Name"> 
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Status</label>
                    </div>
                    <div class="col-md-9">
                      <!-- <input type="text" name="user_name" required id="user_name" class="user_name" placeholder="User Name"> -->
                      <select name="status">
                        <option value=>Select Status</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>
                    </div>
                </div>
                <div class="add-btns">
                    <button class="btn add-btn" type="submit">Submit</button>
                  </div>
                </form>
            </div>
          </div><!--/.col-->
        </div><!--/.row-->
        </div>
      </div>
    </div><!--/.col-->
  </div>
  </div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

@endsection

@section('script')
<script>
$('select').selectpicker();
</script>

@endsection