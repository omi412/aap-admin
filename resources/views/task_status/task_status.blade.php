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
      <div class="msg">
        <div id="success_message" style="margin: 20px 0px;"></div>
      </div>
      <ul id="update_msgList"></ul>
      <ul id="save_msgList"></ul>
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
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <!-- <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i> </button> -->
            </div>
          </div>
          <table class="table table-striped responsive all_table" id="table">
            <thead>
              <tr>
                <th style="width: 70px;">S No.</th>
                <th>Task Title</th>
                <th>Task Description</th>
                <th>Assign To</th>
                <th>Volunteer</th>
                <!-- <th>Date</th> -->
                <th>Status</th>
                <th style="text-align: right;">Action</th>
              </tr>
            </thead>
            <tbody id="myTable">
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
          <i class="fa fa-align-justify"></i><span id="spn-title">Add Task</span>
        </div>
        <div class="card-body pending_approval">
          <form id="task_status" name="postForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                   <input type="hidden" id="edit-task-id" value="" />
                  <label for="name">Task Title</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control task_title" name="task_title" id="task_title" aria-describedby="task_title" value="{{ old('task_title') }}" placeholder="Task Title" required >
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Assign to</label>
              </div>
              <div class="col-md-9">
                <!-- <select class="form-control assign_to" name="assign_to" id="assign_to" required >
                    <option value="Mandal Prabhari">Mandal Prabhari</option>
                    <option value="Ward Prabhari">Ward Prabhari</option>
                    <option value="Booth Prabhari">Booth Prabhari</option>
                    <option value="Gali Prabhari">Gali Prabhari</option>
                </select> -->
                  <select name="assign_to" id="ddl-role" class="form-control assign_to role" required >
                    <!-- <option value="">Select Designation</option> -->
                    @foreach(getRoles() as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
              </div>
              </div>
              <div class="form-group row" id="div-mandal">
                <div class="col-md-3">
                  <label for="name">Mandal</label>
                </div>
                <div class="col-md-9">

                    <select name="mandal_id" id="ddl-mandal" class="form-control volunteer">
                      <option value="">Select Mandal</option>
                      @foreach($mandals as $mandal)
                      <option value="{{ $mandal->id }}">{{ $mandal->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row" id="div-ward" style="display: none;">
                <div class="col-md-3">
                  <label for="name">Ward</label>
                </div>
                <div class="col-md-9">

                    <select name="ward_id" id="ddl-ward" class="form-control volunteer">
                      <option value="">Select Ward</option>
                      @foreach($wards as $ward)
                      <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row" id="div-booth" style="display: none;">
                <div class="col-md-3">
                  <label for="name">Booth</label>
                </div>
                <div class="col-md-9">

                    <select name="booth_id" id="ddl-booth" class="form-control volunteer">
                      <option value="">Select Booth</option>
                      @foreach($booths as $booth)
                      <option value="{{ $booth->id }}">{{ $booth->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row" id="div-gali" style="display: none;">
                <div class="col-md-3">
                  <label for="name">Gali</label>
                </div>
                <div class="col-md-9">

                    <select name="gali_id" id="ddl-gali" class="form-control volunteer">
                      <option value="">Select Gali</option>
                      @foreach($galies as $gali)
                      <option value="{{ $gali->id }}">{{ $gali->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Address</label>
                </div>
                <div class="col-md-9">
                  <textarea name="address" id="address" class="form-control" placeholder="Address" required ></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Task Description</label>
                </div>
                <div class="col-md-9">
                  <textarea name="task_description" id="task_description" class="form-control task_description" placeholder="Task Description" required ></textarea>
                </div>
              </div>
              <div class="form-group row" id="div-status" style="display: none;">
                <div class="col-md-3">
                  <label for="name">Status</label>
                </div>
                <div class="col-md-9">
                    <select name="status" id="ddl-status" class="form-control">
                      <option value="">Select Status</option>
                      
                      <option value="0">Pending</option>
                      <option value="1">Complete</option>
                    </select>
                </div>
              </div>
              <div class="form-group row" id="div-image" style="display: none;">
                <div class="col-md-3">
                  <label for="name">Upload Image</label>
                </div>
                <div class="col-md-9">
                    <!-- <input type="file" name="image" id="image" style="display: block;" placeholder="form-control"> -->
                    <input type="file" name="image" id="file-upload">
                    <label class="label_file" for="file-upload">Upload Image</label>
                </div>
              </div>
              <div class="form-group row" id="div-remark" style="display: none;">
                <div class="col-md-3">
                  <label for="password1">Remark</label>
                </div>
                <div class="col-md-9">
                  <textarea name="remark" id="remark" class="form-control task_description" placeholder="Remark"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success sub_task" id="btn-submit">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>

  {{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Volunteer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

  @endsection

        <!--**********************************
            Content body end
        ***********************************-->
@section('script')
<script>
  
  $("#show_second").click(function(){
    $("#section_first").hide();
    $("#section_second").show();
    $('#task_status')[0].reset();
    $('#btn-submit').text('Submit');
    $('#spn-title').text('Add Task');
    $('#edit-task-id').val('');
    $('#div-remark,#div-image,#div-status').hide();
    $('#ddl-status,#remark,#image').attr('required',false);

  });

  $("#show_first").click(function(){
    $("#section_second").hide();
    $("#section_first").show();
  });

</script>
<script type="text/javascript">

  $(document).ready(function () {

        $('#ddl-role').change(function(){
      let role = $(this).val();
      if(role==''){
        $('#div-ward,#div-booth,#div-gali').hide();
        $('#ddl-mandal,#ddl-ward,#ddl-booth,#ddl-gali').attr('required',false);
      }else if(role==3){ // mandal
        $('#div-ward,#div-booth,#div-gali').hide();
        $('#div-mandal').show();
        $('#ddl-mandal').attr('required',true);
        $('#ddl-ward,#ddl-booth,#ddl-gali').attr('required',false);
      }else if(role==4){ //ward
        $('#div-mandal,#div-booth,#div-gali').hide();
        $('#div-ward').show();
        $('#ddl-ward').attr('required',true);
        $('#ddl-mandal,#ddl-booth,#ddl-gali').attr('required',false);
      }else if(role==5){ // booth
        $('#div-booth').show();
        $('#div-mandal,#div-ward,#div-gali').hide();
        $('#ddl-booth').attr('required',true);
        $('#ddl-mandal,#ddl-ward,#ddl-gali').attr('required',false);
      }else if(role==6){ // gali
        $('#div-mandal,#div-ward,#div-booth').hide();
        $('#div-gali').show();
        $('#ddl-gali').attr('required',true);
        $('#ddl-mandal,#ddl-ward,#ddl-booth').attr('required',false);
      }
    });

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

        $('#task_status').on('submit', function(e) {
            e.preventDefault();
            let url = "{{ url('task-status') }}";
            let method = "POST";
            if($('#edit-task-id').val()!=''){ // update case
              url = "{{ url('update-task-status') }}/"+$('#edit-task-id').val();
              method = "PUT";
            }
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: method,
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",

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