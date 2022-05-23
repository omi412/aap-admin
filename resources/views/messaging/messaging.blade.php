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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Messaging</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="row" *ngIf="(activeUser=='admin')">
    <div class="col-md-12">
      <div class="volunter msg">
        <div id="success_message" style="margin: 20px 0px;"></div>
      </div>
      <div class="card volunter">
        <div class="card-header">
         <i class="fa fa-align-justify"></i> Messages
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-sm-6 col-lg-12">
            <div class="volunter_add messaging">
                <form id="volunteer" name="postForm" method="POST">
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Message</label>
                    </div>
                    <div class="col-md-9">
                      <textarea name="message" id="message" class="message" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Send to</label>
                    </div>
                    <div class="col-md-9">
                      <!-- <div class="form-check form-check-inline">
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
                      </div> -->
                      <!-- <select class="selectpicker" multiple data-live-search="true">
                        <option>Ward Prabhari</option>
                        <option>Mandal Prabhari</option>
                        <option>Booth Prabhari</option>
                        <option>Gali Prabhari</option>
                      </select> -->
                      <select class="selectpicker send_to" id="send_to" name="send_to[]" multiple data-live-search="true">
                          <option value="Ward Prabhari">Ward Prabhari</option>
                          <option value="Mandal Prabhari">Mandal Prabhari</option>
                          <option value="Booth Prabhari">Booth Prabhari</option>
                          <option value="Gali Prabhari">Gali Prabhari</option>
                      </select>
                    </div>
                </div>
                <!-- <div class="send_label">
                    <label>Send to</label>
                  </div> -->
                  <div class="add-btns">
                    <button class="btn add-btn" type="submit"><i class="fa fa-location-arrow" style="margin-right: 6px;"></i>Send</button>
                  </div>
                </form>
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
          <div class="search_box">
            <div class="input-group">
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <!-- <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i> </button> -->
            </div>
          </div>
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
  </div>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

@endsection

@section('script')
<script>
$('select').selectpicker();
</script>
<script type="text/javascript">

  $(document).ready(function () {

        
       $('#volunteer').on('submit', function(e) {
            e.preventDefault();

            var data = {
                'message': $('.message').val(),
                'send_to': $('.send_to').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/messaging",
                data: data,
                dataType: "json",
                success: function (response) {
                     console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                    }
                }
            });

        });

       /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var volunteer_id = $(this).val();
            //alert(volunteer_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-volunteer-type/" + volunteer_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                         console.log(response.volunteer.volunteer_type);
                        $('#volunteer_types').val(response.volunteer.volunteer_type);
                        $('#volunteer_id').val(volunteer_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_volunteer', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#volunteer_id').val();
            // alert(id);

            var data = {
                'volunteer_types': $('#volunteer_types').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-volunteer-type/" + id,
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_volunteer').text('Update');
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('.update_volunteer').text('Update');
                        $('#editModal').modal('hide');
                       
                    }
                }
            });

        });

       /* edit ajax*/

       /* delete volunteer */

        $(document).on('click', '.deletebtn', function () {
            var stud_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(stud_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var volunteer_id = $('#deleteing_id').val();
            //alert(volunteer_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-volunteer-type/" + volunteer_id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                       
                    }
                }
            });
        });

       /* delete volunteer */

    });

</script>

<!-- /* search function */ -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
 <!-- /* search function */ -->



@endsection