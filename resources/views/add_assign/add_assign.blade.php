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
      <a ng-reflect-router-link="/" href="{{ url('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item active" ng-reflect-ng-class="[object Object]">
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Update Task Status</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="volunter_list">
    <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i>Task Status Detail
        </div>
        <div class="card-body assign">
          <form>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">Task Title</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Add new ward prabhari" readonly>
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Task Description</label>
                </div>
                <div class="col-md-9">
                  <textarea class="form-control" readonly>A nagar parishad or city council is a form of an urban political unit in India comparable to a municipality. </textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Status</label>
              </div>
              <div class="col-md-9">
                <!-- <input type="text" class="form-control" id="approval" placeholder="Approval"> -->
                <select name="approval" class="form-control">
                      <option>Select Status</option>
                      <option>Not Complete</option>
                      <option>Complete</option>
                    </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Upload Image</label>
              </div>
              <div class="col-md-9">
                <input type="file" id="file-upload">
                <label class="label_file" for="file-upload">Upload Image</label>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Remarks</label>
              </div>
              <div class="col-md-9">
                <textarea class="form-control">Remarks</textarea>
              </div>
              </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success action-button">Save</button>
              <button type="submit" class="btn btn-success reset">Reset</button>
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
$(document).ready(function () {
    $('#file-upload').on('change',function(){
       alert('working');
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.label_file').html(fileName);
    });
  });

</script>

@endsection