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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Contacts</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list">
    <div class="row"  id="section_first">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add Contact</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i>Contact List
        </div>
        <div class="card-body contact">
           <div class="search_box">
            <div class="input-group">
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <table class="table table-striped responsive all_table" id="table">
            <thead>
              <tr>
                <th style="width: 70px;">S No.</th>
                <th style="width: 110px;">User Type</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <!-- <th style="text-align: right;">Action</th> -->
              </tr>
            </thead>
            <tbody id="myTable">
              <tr>
                <td><a href="">1</a></td>
                <td><a href="">Public</a></td>
                <td><a href="">Vishal Saxena</a></td>
                <td><a href="">28</a></td>
                <td><a href="">Male</a></td>
                <td><a href="">Narwana Rd, I.P.Extension, West Vinod Nagar, New Delhi, Delhi 110092 </a></td>

               <!--  <td style="text-align: right;"><a href="/#/edit-contact">
                  <i class="fa fa-edit" style="color:#0072b0"></i></a>
                </td> -->
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
  </div><!--/.row-->
    <div class="row"  id="section_second" style="display: none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-primary"><i class="fa fa-list" style="margin-right: 6px;"></i>Contact List</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i>Add Contact
        </div>
        <div class="card-body pending_approval">
          <form id="contact" name="postForm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="" id="edit-form-method">
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">First Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="firstname" aria-describedby="firstname" placeholder="First Name">
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Last Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Gender</label>
              </div>
              <div class="col-md-9">
                <select class="form-control">
                    <option>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Age</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" id="age" placeholder="Enter Age">
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">User Type</label>
              </div>
              <div class="col-md-9">
                <select class="form-control">
                    <option value="0" selected>Public</option>
                    <option value="1">Volunteer</option>
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">House</label>
              </div>
              <div class="col-md-9">
                <select class="form-control">
                    <option value="0">Select House</option>
                    <option value="1">Narwana Rd, I.P.Extension, West Vinod Nagar, New Delhi, Delhi 110092</option>
                    <option value="2">133, South Avenue, New Delhi, Delhi-110001</option>
                    <option value="3">9, Pandit Pant Marg, New Delhi - 110001 </option>
                </select>
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
</div>


@endsection

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


<script type="text/javascript">

  $(document).ready(function () {

      fetchtaskstatus();

        function fetchtaskstatus() {
          //alert("working");
          let status=['Pending','Completed'];
            $.ajax({
                type: "GET",
                url: "/fetch-task-status",
                dataType: "json",
                success: function (response) {
                     console.log(response);
                    $('tbody').html("");
                    $.each(response.taskStatus, function (key, item) {
                        $('tbody').append(`<tr>
                            <td>` + item.id + `</td>
                            <td>` + item.task_title + `</td>
                            <td>` + item.task_description + `</td>
                            <td>` + item.role.name + `</td>
                            <td>` + item.role_detail.name + `</td>
                            <td>`+status[item.status]+`</td>
                            
                            <td><button type="button" value="` + item.id + `" class="btn btn-info editbtn btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>
                            <button type="button" value="` + item.id + `" class="btn btn-danger deletebtn btn-sm" title="Delete"><i class="fa fa-trash"></i></button></td>
          }
          </tr>`);
                    });
                }
            });
        }

        $('#contact').on('submit', function(e) {
            e.preventDefault();
            let url = "{{ url('task-status') }}";
            let method = "POST";
            if($('#edit-task-id').val()!=''){ // update case
              url = "{{ url('update-task-status') }}/"+$('#edit-task-id').val();
            }
            $.ajax({
                method:"POST",
                url: url,
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: "JSON",

                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    } else if(response.status == 200) {
                        notification('success',response.message);

                        $('#task_status')[0].reset();
                        notification('success',response.message);
                        $('#section_second').hide();
                        $('#section_first').show();
                        fetchtaskstatus();

                    }else{
                      notification('danger',response.error,5000);
                    }
                }
            });

        });

       /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var task_id = $(this).val();
            //alert(volunteer_id);
            $('#section_second').show();
            $('#section_first').hide();
            $('#btn-submit').text('Update');
            $('#spn-title').text('Edit Task');
            $('#div-remark,#div-image,#div-status').show();
            $('#edit-form-method').val('PUT');
            $.ajax({
                type: "GET",
                url: "{{ url('edit-task-status') }}/" + task_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        var taskData = response.taskStatus;
                        
                        $('#task_title').val(taskData.task_title);
                        $('#ddl-role').val(taskData.assign_to);
                        $('#task_description').val(taskData.task_description);
                        $('#address').val(taskData.address);
                        
                        if(taskData.role.name=='Mandal Prabhari'){
                          
                          $('#div-ward,#div-booth,#div-gali').hide();
                          $('#div-mandal').show();
                          $('#ddl-mandal').val(taskData.volunteer);
                        
                        }else if(taskData.role.name=='Ward Prabhari'){
                          $('#div-mandal,#div-booth,#div-gali').hide();
                          $('#div-ward').show();

                          $('#ddl-ward').val(taskData.volunteer);
                        }else if(taskData.role.name=='Booth Prabhari'){
                          
                          $('#div-mandal,#div-ward,#div-gali').hide();
                          $('#div-booth').show();
                          $('#ddl-booth').val(taskData.volunteer);
                        
                        }else if(taskData.role.name=='Gali Prabhari'){
                          $('#div-mandal,#div-ward,#div-booth').hide();
                          $('#div-gali').show();
                          $('#ddl-gali').val(taskData.volunteer);
                        }
                        $('#edit-task-id').val(task_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

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
                        fetchtaskstatus();
                    }
                }
            });
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
