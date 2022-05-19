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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Volunteer Types</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="row">
    <div class="col-md-12">
      <div class="card volunter">
        <div class="card-header">
          Add Volunter
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-sm-6 col-lg-9">
            <div class="volunter_add">
                <div>
                  <input type="text" name="name" placeholder="Volunter Types" />
                </div>
            </div>
          </div><!--/.col-->
          <div class="col-sm-6 col-lg-3">
            <div class="add-btns">
                <a href="#" class="btn add-btn"><i class="fa fa-plus" style="margin-right: 6px;"></i>Add</a>
            </div>
          </div>
        </div><!--/.row-->
        </div>
      </div>
    </div><!--/.col-->
  </div>
  <div class="volunter_list">
    <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Volunteer Lists
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Volunteer Types</th>
                <th style="text-align: right;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ward Prabhari</td>
                <td style="text-align: right;">
                  <a href="#" class="btn btn-info"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <td>Mandal Prabhari</td>
                <td style="text-align: right;">
                  <a href="#" class="btn btn-info"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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



        <!--**********************************
            Content body end
        ***********************************-->
  
@endsection
   