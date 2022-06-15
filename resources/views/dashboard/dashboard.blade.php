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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Dashboard</span>
    </li>
  </ol>
</cui-breadcrumb>
<div class="animated fadeIn dashboard dash">
  <div class="row">
    <div class="col-lg-12">
      <div class="welcome_div">
        <h2>Welcome to Dashboard </h2>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Volunter
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-sm-6 col-lg-6" style="padding: 6px;">
            <div class="brand-card">
              
              <div class="brand-card-body">
                <div>
                  <div class="text-value">{{ $mandals->count() }}</div>
                  <div class="text-uppercase text-muted small">Mandal Prabhari</div>
                </div>
                
              </div>
            </div>
          </div><!--/.col-->
          <div class="col-sm-6 col-lg-6" style="padding: 6px;">
            <div class="brand-card">
              
              <div class="brand-card-body">
                <div>
                  <div class="text-value">{{ $wards->count() }}</div>
                  <div class="text-uppercase text-muted small">Ward Prabhari</div>
                </div>
                
              </div>
            </div>
          </div><!--/.col-->
          <div class="col-sm-6 col-lg-6" style="padding: 6px;">
            <div class="brand-card">
              
              <div class="brand-card-body">
                <div>
                  <div class="text-value">{{ $booths->count() }}</div>
                  <div class="text-uppercase text-muted small">Booth Prabhari</div>
                </div>
                
              </div>
            </div>
          </div><!--/.col-->
          <div class="col-sm-6 col-lg-6" style="padding: 6px;">
            <div class="brand-card">
              <div class="brand-card-body">
                <div>
                  <div class="text-value">{{ $galies->count() }}</div>
                  <div class="text-uppercase text-muted small">Gali Prabhari</div>
                </div>
              </div>
            </div>
          </div><!--/.col-->
          
        </div><!--/.row-->
        </div>
      </div>
    </div><!--/.col-->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Tasks
        </div>
        <div class="card-body tasks">
           <div class="card-group mb-4">
              <div class="card">
                <div class="card-body">
                  <!-- <div class="h1 text-muted text-right mb-4">
                    <i class="icon-people"></i>
                  </div> -->
                  <div class="h4 mb-0">{{ $taskStatus->count() }}</div>
                  <small class="text-muted text-uppercase font-weight-bold">Total</small>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                 <!--  <div class="h1 text-muted text-right mb-4">
                    <i class="icon-user-follow"></i>
                  </div> -->
                
                  <div class="h4 mb-0">

                    {{ $taskComplete->count() }}</div>
                 
                  <small class="text-muted text-uppercase font-weight-bold">Complete</small>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <!-- <div class="h1 text-muted text-right mb-4">
                    <i class="icon-basket-loaded"></i>
                  </div> -->
                  <div class="h4 mb-0">{{ $taskPending->count() }}</div>
                  <small class="text-muted text-uppercase font-weight-bold">Pending</small>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div><!--/.col-->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Panding Approval
        </div>
        <div class="card-body tasks panding">
           <div class="card-group mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="h1 text-muted text-left mb-2">
                    <i class="icon-people" style="color: #0072b0;"></i>
                  </div>
                  <div class="h4 mb-0">1</div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div><!--/.col-->
  </div><!--/.row-->
</div>
  
@endsection
   