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
      <div class="volunter msg">
        <div id="success_message" style="margin: 20px 0px;"></div>
      </div>
      <div class="card volunter">
        <div class="card-header">
          Add Volunteer
        </div>
        <ul id="update_msgList"></ul>
        <div class="card-body">
          <form id="volunteer" name="postForm" method="POST">
             <div class="row">
              <div class="col-sm-6 col-lg-9">
                <div class="volunter_add">
                  <input type="hidden" id="volunteer_id" />
                    <div>
                      <input type="text" name="volunteer_types" class="volunteer_types" id="valunteer_type" placeholder="Volunteer Types" />
                    </div>
                </div>
              </div><!--/.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="add-btns">
                    <button type="submit" class="btn add-btn"><i class="fa fa-plus" style="margin-right: 6px;"></i>Add</button>
                </div>
              </div>
            </div><!--/.row-->
          </form>
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
          <div class="search_box">
            <div class="input-group">
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <!-- <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i> </button> -->
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>S No.</th>
                <th>Volunteer Types</th>
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
  </div><!--/.row-->
</div>
{{-- Edit Modal --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit & Update Volunteer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul id="update_msgList"></ul>

        <input type="hidden" id="volunteer_id" />

        <div class="form-group mb-3">
            <input type="text" name="volunteer_types" class="volunteer_types form-control" id="volunteer_types" placeholder="Volunteer Types" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary update_volunteer">Update</button>
      </div>
    </div>
  </div>
</div>
{{-- Edn- Edit Modal --}}
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

        <!--**********************************
            Content body end
        ***********************************-->
  
@endsection
@section('script')
<script type="text/javascript">

  $(document).ready(function () {

        fetchvolunteer();

        function fetchvolunteer() {
          //alert("working");
            $.ajax({
                type: "GET",
                url: "/fetch-volunteer-types",
                dataType: "json",
                success: function (response) {
                     console.log(response);
                    $('tbody').html("");
                    $.each(response.volunteers, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.volunteer_type + '</td>\
                            <td width=10px><button type="button" value="' + item.id + '" class="btn btn-info editbtn btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button></td>\
                            <td width=10px><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm" title="Delete"><i class="fa fa-trash"></i></button></td>\
                        \</tr>');
                    });
                }
            });
        }

       $('#volunteer').on('submit', function(e) {
            e.preventDefault();

            var data = {
                'volunteer_types': $('.volunteer_types').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/volunteer-types",
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
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                        fetchvolunteer();
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
                        fetchvolunteer();
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
                        fetchvolunteer();
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