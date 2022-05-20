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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">House Data</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list">
    <div class="row" id="section_first">
    <div class="col-lg-12">
      <div class="card">
         <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary show_second"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add House Data</a>
              <a href="javascript:void(0)" id="show_third" class="btn btn-outline-info show_third"><i class="fa fa-download" style="margin-right: 6px;"></i> House Data Import</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> House Data 
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
                <th>Owner </th>
                <th>House No.</th>
                <th>Ward</th>
                <th style="text-align: right;">Remarks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Sachin</td>
                <td>316 </td>
                <td>Ward-47</td>

                <td style="text-align: right;">
                  Add house data for ward 47
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Amit</td>
                <td>320</td>
                <td>Ward-49 </td>

                <td style="text-align: right;">
                   Add house data for ward 49
                </td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
  </div><!--/.row-->
    <div class="row" id="section_second" style="display: none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-primary show_first"><i class="fa fa-list" style="margin-right: 6px;"></i> House Data List</a>
              <a href="javascript:void(0)" id="show_third" class="btn btn-outline-info show_third"><i class="fa fa-download" style="margin-right: 6px;"></i> House Data Import</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> House Data 
        </div>
        <div class="card-body pending_approval">
          <form>
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">Owner</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">House No.</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="number" placeholder="Enter House No.">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Address line 1</label>
              </div>
              <div class="col-md-9">
               <textarea class="form-control">Address Line 1</textarea>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Address line 2</label>
              </div>
              <div class="col-md-9">
               <textarea class="form-control">Address Line 2</textarea>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Ward</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" id="degisnation" placeholder="Ward">
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
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div><!--/.row-->
     <div class="row" id="section_third" style="display: none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary show_second"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add House Data</a>
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-info show_first"><i class="fa fa-list" style="margin-right: 6px;"></i> House Data List</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Import House Data 
        </div>
        <div class="card-body pending_approval upload_house">
          <div class="box-fileupload">
                <input type="file" id="fileId" class="file-upload-input" name="files" multiple>
                <label for="fileId" class="file-upload-btn"></label>
                <p class="box-fileupload__lable">Drop files here to upload</p>
            </div>
            <div class="error-wrapper"></div>
            <div class="image-previwe"></div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Import</button>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
  </div>
</div>

@endsection

@section('script')

<script>
  
  $(".show_second").click(function(){
    $("#section_first").hide();
    $("#section_third").hide();
    $("#section_second").show();
  });

  $(".show_third").click(function(){
    $("#section_second").hide();
    $("#section_first").hide();
    $("#section_third").show();
  });

  $(".show_first").click(function(){
    $("#section_second").hide();
    $("#section_third").hide();
    $("#section_first").show();
  });

</script>
@endsection
