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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Role</span>
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
              <a href="{{ route('roles.index') }}" class="btn btn-outline-primary"><i class="fa fa-list" style="margin-right: 6px;"></i>Role List</a>
            </div>
          </div>
        <div class="card-header">
         <i class="fa fa-align-justify"></i>Edit Role
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-sm-6 col-lg-12">
            <div class="volunter_add messaging">
                <form action="{{ route('roles.update',$role->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Name</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="name" required value="{{ $role->name }}" class="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Permission</label>
                    </div>
                    <div class="col-md-9">
                      <select class="js-example-basic-multiple" required name="permission[]" multiple="multiple" >
                        @foreach($permission as $value)
                          <option value="{{ $value->id }}" {{ in_array($value->id,$rolePermissions) ? 'selected' : '' }}>{{ $value->name }}</option>
                        @endforeach
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
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> -->


@endsection

@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
//$('select').selectpicker();
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection