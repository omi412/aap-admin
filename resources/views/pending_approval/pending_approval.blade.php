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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Pending Approval</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="volunter_list">
    <div class="row">
    <div class="col-lg-12">
      <div class="msg">
        <div id="success_message" style="margin: 20px 0px;"></div>
      </div>
      <ul id="update_msgList"></ul>
      <ul id="save_msgList"></ul>
      <div class="card pen_appr">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Pending Approvals
        </div>
        <div class="card-body">
          <div class="search_box">
            <div class="input-group">
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>

              <a href="javascript:void(0)" id="btn-user-model" class="btn btn-outline-primary"><i class="fa fa-plus"></i>Add</a>
            </div>
          </div>
          <table class="table table-striped responsive all_table">
            <thead>
              <tr>
                <th>S No.</th>
                <th>Name</th>
                <th>Number</th>
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

<div class="modal fade pending_approval" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="POST" id="pending-approval-form">
        @csrf
        <input type="hidden" name="pending_approval_id" id="pending-approval-id" value="">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-md-3">
              <label for="name">Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Mobile No</label>
            </div>
            <div class="col-md-9">
              <input type="number" class="form-control" name="mobileno" id="mobileno">
            </div>
          </div>
          <!-- <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Approval</label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control" id="approval" placeholder="Approval">
            <select name="approval" id="approval" class="form-control">
                  <option>Select Approval</option>
                  <option>Approved</option>
                  <option>Rejected</option>
                </select>
          </div>
          </div> -->
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Designation</label>
            </div>
            <div class="col-md-9">
              <select name="role" id="ddl-role" class="form-control">
                <!-- <option value="">Select Designation</option> -->
                @foreach(getRoles() as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-mandal">
            <div class="col-md-3">
              <label for="password1">Mandal</label>
            </div>
            <div class="col-md-9">
              <select name="designation" id="ddl-mandal" class="form-control">
                <option value="">Select Mandal</option>
                @foreach($mandals as $mandal)
                <option value="{{ $mandal->id }}">{{ $mandal->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-ward" style="display: none;">
            <div class="col-md-3">
              <label for="password1">Ward</label>
            </div>
            <div class="col-md-9">
              <select name="designation" id="ddl-ward" class="form-control">
                <option value="">Select Ward</option>
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-booth" style="display: none;">
            <div class="col-md-3">
              <label for="password1">Booth</label>
            </div>
            <div class="col-md-9">
              <select name="designation" id="ddl-booth" class="form-control">
                <option value="">Select Booth</option>
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-gali" style="display: none;">
            <div class="col-md-3">
              <label for="password1">Gali</label>
            </div>
            <div class="col-md-9">
              <select name="designation" id="ddl-gali" class="form-control">
                <option value="">Select Gali</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Manager</label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="manager" id="manager" placeholder="Manager">
          </div>
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-success update_approval">Submit</button>
        </div>
      </form>
    </div>
  </div>
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


<script>

  $(document).ready(function(){
    $('#btn-user-model').click(function(){
      $('#editModal').modal('show');
    });
    //$('#pending_approval').modal('show');
    $('#ddl-role').change(function(){
      let role = $(this).val();
      if(role==''){
        $('#div-ward,#div-booth,#div-gali').hide();
      }else if(role==3){ // mandal
        $('#div-ward,#div-booth,#div-gali').hide();
        $('#div-mandal').show();
      }else if(role==4){ //ward
        $('#div-booth,#div-gali').hide();
        $('#div-ward,#div-mandal').show();
      }else if(role==5){ // booth
        $('#div-gali').hide();
        $('#div-mandal,#div-ward,#div-booth').show();
      }else if(role==6){ // gali
        $('#div-mandal,#div-ward,#div-booth,#div-gali').show();
      }
    });

    $('#ddl-mandal').change(function(){
      let mandal_id = $(this).val();
      let ward_opt = `<option value=''>Select Ward</option>`;
      $.ajax({
        "url":"{{ url('get-wards') }}/"+mandal_id,
        "type":"POST",
        "data":{_token:token,role_id:role},
        "success":function(response){
          if(response.status==200){
            let wards = response.ward;
            for (var i = 0; i < wards.length; i++) {
              ward_opt +=`<option value='`+wards[i].id+`'>`+wards[i].name+`</option>`;
            }
          }else{
            notification('danger',response.error);
          }
        },error:function(error){
          notification('danger','Oops! Something went wrong');
        }

      });
    });

    fetchPendingApproval();

        function fetchPendingApproval() {
          //alert("working");
            $.ajax({
                type: "GET",
                url: "{{ url('pending-approval') }}",
                dataType: "json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.pending_approval, function (key, item) {
                        $('tbody').append(`<tr>
                            <td>` + item.id + `</td>
                            <td>` + item.name + `</td>
                            <td>` + item.mobileno + `</td>
                            <td style="text-align: right;"><button type="button" value="` + item.id + `" class="btn btn-info editbtn btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>
                          </tr>`);
                    });
                }
            });
        }

       $('#pending-approval-form').on('submit', function(e) {
            e.preventDefault();
            //check form submit is store or update
            let pending_approval_id = $('#pending-approval-id').val();
            let url = "{{ url('pending-approval.store') }}";
  
            if(pending_approval_id!=''){
              url = "{{ url('update-pending-approval') }}/"+pending_approval_id;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: $('#pending-approval-form').serialize(),
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

                        $('#pending-approval-form')[0].reset();
                        $('#section_second').hide();
                        $('#section_first').show();
                        $('#btn-submit').text('Save');
                        $('#pending-approval-id').val('');
                        fetchPendingApproval();
                    }else{
                      notification('danger',response.error,5000);
                    }
                }
            });

        });

 /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var pending_approval_id = $(this).val();
            //alert(pending_approval_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-pending-approval/" + pending_approval_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        // console.log(response.pending_approval.name);
                        // console.log(response.pending_approval.mobileno);
                        $('#name').val(response.pending_approval.name);
                        $('#mobileno').val(response.pending_approval.mobileno);
                        $('#pending-approval-id').val(pending_approval_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_approval', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#pending-approval-id').val();
             //alert(id);

            var data = {
                'name': $('#name').val(),
                'mobileno': $('#mobileno').val(),
                'approval': $('#approval').val(),
                'designation': $('#designation').val(),
                'manager': $('#manager').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/update-pending-approval/" + id,
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
                        $('.update_approval').text('Update');
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('.update_approval').text('Update');
                        $('#editModal').modal('hide');
                        fetchPendingApproval();
                    }
                }
            });

        });

       /* edit ajax*/


       /* delete volunteer */

        $(document).on('click', '.deletebtn', function () {
            var house_data_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(house_data_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var house_data_id = $('#deleteing_id').val();
            //alert(house_data_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "{{ url('delete-house-data') }}/" + house_data_id,
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
                        fetchPendingApproval();
                    }
                }
            });
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
