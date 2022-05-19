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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">messaging</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="row" *ngIf="(activeUser=='admin')">
    <div class="col-md-12">
      <div class="card volunter">
        <div class="card-header">
         <i class="fa fa-align-justify"></i> Messages
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-sm-6 col-lg-12">
            <div class="volunter_add messaging">
                <div>
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Message</label>
                    </div>
                    <div class="col-md-9">
                      <textarea name="message" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Send to</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Ward Prabhari</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Mandal Prabhari</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label" for="inlineCheckbox3">Booth Prabhari</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                        <label class="form-check-label" for="inlineCheckbox4">Gali Prabhari</label>
                      </div>
                      <!-- <select class="selectpicker" multiple data-live-search="true">
                        <option>Ward Prabhari</option>
                        <option>Mandal Prabhari</option>
                        <option>Booth Prabhari</option>
                        <option>Gali Prabhari</option>
                      </select> -->
                    </div>
                </div>
                <!-- <div class="send_label">
                    <label>Send to</label>
                  </div> -->
                  <div class="add-btns">
                    <a href="#" class="btn add-btn"><i class="fa fa-location-arrow" style="margin-right: 6px;"></i>Send</a>
                  </div>
                </div>
            </div>
          </div><!--/.col-->
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
          <i class="fa fa-align-justify"></i> Message History
        </div>
        <div class="card-body">
          <table class="table table-striped responsive all_table">
            <thead>
              <tr>
                <th>Message</th>
                <th>Date</th>
                <th style="text-align: right;">Sent to</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="#" data-toggle="modal" data-target="#form" style="color: #000;">Can i join to Both Prabhari in Uttar vindhan sabha</a></td>
                <td>04/02/2022</td>
                <td style="text-align: right;">
                  Booth Prabhari
                </td>
              </tr>
              <tr>
                <td><a href="#" data-toggle="modal" data-target="#form" style="color: #000;">Can i join to Ward Prabhari in South Madhay vindhan sabha</a></td>
                <td>04/02/2022</td>
                <td style="text-align: right;">
                  Ward Prabhari
                </td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
  <div class="modal fade pending_approval" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form-group row">
          <div class="col-md-12">
            <textarea class="form-control" readonly cols="12" rows="4">Can i join to Ward Prabhari in South Madhay vindhan sabha Bhopal Madhya pradesh 46003 </textarea>
          </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

@endsection

@section('script')
@endsection