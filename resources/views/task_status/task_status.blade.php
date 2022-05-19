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
      <span tabindex="0" >Task Status</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list tasks">
    <div class="row" id="section_first">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add Task</a>
            </div>
        </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Tasks
        </div>
        <div class="card-body">
          <div class="search_box">
            <div class="input-group">
              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i> </button>
            </div>
          </div>
          <table class="table table-striped responsive all_table" id="table">
            <thead>
              <tr>
                <th style="width: 70px;">S No.</th>
                <th>Task Title</th>
                <th>Task Description</th>
                <th>Date</th>
                <th style="text-align: right;">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="/#/task-details">1</a></td>
                <td><a href="/#/task-details">Add new ward prabhari</a></td>
                <td><a href="/#/task-details">A nagar parishad or city council is a form of an urban political unit in India comparable to a municipality. </a></td>
                <td><a href="/#/task-details">08/02/2022 </a></td>

                <td style="text-align: right;"><a href="/#/task-details">
                  150/750</a>
                </td>
              </tr>
              <tr>
                <td><a href="/#/task-details">2</a></td>
                <td><a href="/#/task-details">Add new ward prabhari</a></td>
                <td><a href="/#/task-details">A nagar parishad or city council is a form of an urban political unit in India comparable to a municipality. </a></td>
                <td><a href="/#/task-details">08/02/2022 </a></td>

                <td style="text-align: right;"><a href="/#/task-details">
                  90/250</a>
                </td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>

     <div class="row"  id="section_second" style="display:none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-primary"><i class="fa fa-list" style="margin-right: 6px;"></i>Tasks List</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Add Task
        </div>
        <div class="card-body pending_approval">
          <form>
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">Task Title</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="firstname" aria-describedby="firstname" placeholder="Task Title">
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Assign to</label>
              </div>
              <div class="col-md-9">
                <select class="form-control">
                    <option>Ward Prabhari</option>
                    <option>Mandal Prabhari</option>
                    <option>Booth Prabhari</option>
                    <option>Gali Prabhari</option>
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Task Description</label>
                </div>
                <div class="col-md-9">
                  <textarea class="form-control">Task Description</textarea>
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

  @endsection

        <!--**********************************
            Content body end
        ***********************************-->
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