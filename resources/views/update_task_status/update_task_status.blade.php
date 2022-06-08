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
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <!-- <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i> </button> -->
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
            <tbody id="myTable">
               @foreach ( $taskStatus as $data)
              <tr>
                <td><a href="{{ url('edit-update-task-status',$data->id) }}">1</a></td>
                <td><a href="{{ url('edit-update-task-status',$data->id) }}">Add new ward prabhari</a></td>
                <td><a href="{{ url('edit-update-task-status',$data->id) }}">Narwana Rd, I.P.Extension, West Vinod Nagar, New Delhi, Delhi 110092</a></td>
                <td><a href="{{ url('edit-update-task-status',$data->id) }}">Ramesh Sharma</a></td>
                <td style="text-align: right;"><a href="{{ url('edit-update-task-status',$data->id) }}">
                  <span class="badge badge-success">In Progress</span></a>
                </td>
              </tr>
            @endforeach
              <!-- <tr>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">2</a></td>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">Add new Mandal prabhari</a></td>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">133, South Avenue, New Delhi, Delhi-110001</a></td>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">Meenakshi Jain</a></td>
                <td style="text-align: right;"><a href="{{ url('/banner/'.$data->id.'/edit') }}">
                  <span class="badge badge-danger">Complete</span></a>
                </td>
              </tr>
              <tr>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">3</a></td>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">Add new Booth prabhari</a></td>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">153, South Avenue, New Delhi, Delhi-110001</a></td>
                <td><a href="{{ url('/banner/'.$data->id.'/edit') }}">Rahul Garg</a></td>
                <td style="text-align: right;"><a href="{{ url('/banner/'.$data->id.'/edit') }}">
                  <span class="badge badge-success">In Progress</span></a>
                </td>
              </tr> -->
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

<style type="text/css">
  [data-header-position="fixed"] .content-body {
  padding-top: 3.5rem;
}
</style>

@endsection

@section('script')
<script>
  
  $(document).ready(function () {


       /*$('#task_status').on('submit', function(e) {
            e.preventDefault();
            var data = {
                'task_title': $('.task_title').val(),
                'assign_to': $('.assign_to').val(),
                'task_description': $('.task_description').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/task-status",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#task_status')[0].reset();
                        $('#section_second').hide();
                        $('#section_first').show();
                      
                    }
                }
            });

        });*/

       /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var task_id = $(this).val();
            //alert(volunteer_id);
            $('#section_second').show();
            $('#section_first').hide();
            $('.sub_task').hide();
            $('.update_task').show();
            $.ajax({
                type: "GET",
                url: "/edit-task-status/" + task_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                         console.log(response.taskStatus.task_title);
                        $('#task_title').val(response.taskStatus.task_title);
                        $('#assign_to').val(response.taskStatus.assign_to);
                        $('#task_description').val(response.taskStatus.task_description);
                        $('#task_id').val(task_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_task', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#task_id').val();
            // alert(id);

            var data = {
                'task_title': $('.task_title').val(),
                'assign_to': $('.assign_to').val(),
                'task_description': $('.task_description').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-task-status/" + id,
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
                        $('.update_task').text('Update');
                        $('#section_second').hide();
                        $('#section_first').show();
                        
                    }
                }
            });

        });

       /* edit ajax*/

       /* delete volunteer */

        $(document).on('click', '.deletebtn', function () {
            var task_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(task_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var task_id = $('#deleteing_id').val();
            //alert(task_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-task-status/" + task_id,
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