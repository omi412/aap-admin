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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">{{ request()->segment(1) == 'users' ? 'Users' : 'Pending Approval'}}</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list">
    <div class="row">
    <div class="col-lg-12">
      <div class="msg">
        <div id="success_message" style="margin: 20px 0px;"></div>
      </div>
      <ul id="update_msgList"></ul>
      <!-- <ul id="save_msgList"></ul> -->
      <div class="card">
        <div class="search_box house_data">
          @can('User Create')
            <div class="input-group">
              @if(request()->segment(1) == 'users')
               <a href="javascript:void(0)"  class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 10px;"></i><span id="btn-user-model">Add User</span></a>
              @endif 
            </div>
          @endcan  
        </div>
      <div class="card pen_appr">
        <div class="card-header">
          <i class="fa fa-align-justify"></i>{{ request()->segment(1) == 'users' ? 'Users' : 'Pending Approval'}}
        </div>
        <div class="card-body">
          <div class="search_box">
            <div class="input-group">
              <input type="search" id="myInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <table class="table table-striped responsive all_table">
            <thead>
              <tr>
                <th>S No.</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Role</th>
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
</div>

<div class="modal fade pending_approval" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">{{ request()->segment(1) == 'users' ? 'Add User' : 'Pending Approval'}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <ul id="save_msgList"></ul>
      <form action="POST" id="pending-approval-form">
        @csrf
        <input type="hidden" name="pending_approval_id" id="pending-approval-id" value="">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-md-3">
              <label for="name">Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" required >
            <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Mobile No</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Enter mobile no" minlength="10" maxlength="10" required >
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Designation</label>
            </div>
            <div class="col-md-9">
              <select name="role" id="ddl-role" class="form-control role" required >
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
              <select name="mandal_id" id="ddl-mandal" class="form-control role_mandal" required >
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
              <select name="ward_id" id="ddl-ward" class="form-control ward_id">
                <option value="">Select Ward</option>
               
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-booth" style="display: none;">
            <div class="col-md-3">
              <label for="password1">Booth</label>
            </div>
            <div class="col-md-9">
              <select name="booth_id" id="ddl-booth" class="form-control booth_id">
                <option value="">Select Booth</option>
                <
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-gali" style="display: none;">
            <div class="col-md-3">
              <label for="password1">Gali</label>
            </div>
            <div class="col-md-9">
              <select name="gali_id" id="ddl-gali" class="form-control gali_id">
                <option value="">Select Gali</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Approval</label>
          </div>
          <div class="col-md-9">
           <!--  <input type="text" class="form-control" id="approval"> -->
            <select name="approval" id="edit_approval" class="form-control">
                  <option value="1" selected>Approved</option>
                  <option value="2">Rejected</option>
                </select>
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Manager</label>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="manager" id="edit_manager" placeholder="Manager">
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


{{-- Edit Modal --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit & Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="POST" id="pending-approval-form">
        @csrf
        <input type="hidden" name="user_id" id="user-id" value="">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-md-3">
              <label for="name">Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" id="edit_name" name="name" aria-describedby="emailHelp" readonly>
            
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Mobile No</label>
            </div>
            <div class="col-md-9">
              <input type="number" class="form-control" name="mobileno" id="edit_mobileno" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              <label for="password1">Designation</label>
            </div>
            <div class="col-md-9">
              <select name="role" id="ddl-role" class="form-control">
                
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
              <select name="role_mandal" id="ddl-mandal" class="form-control">
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
              <select name="role_ward" id="ddl-ward" class="form-control">
                
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-booth" style="display: none;">
            <div class="col-md-3">
              <label for="password1">Booth</label>
            </div>
            <div class="col-md-9">
              <select name="role_booth" id="ddl-booth" class="form-control">
                
              </select>
            </div>
          </div>
          <div class="form-group row" id="div-gali" style="display: none;">
            <div class="col-md-3">
              <label for="password1">Gali</label>
            </div>
            <div class="col-md-9">
              <select name="role_gali" id="ddl-gali" class="form-control">
                
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
            <label for="password1">Approval</label>
          </div>
          <div class="col-md-9">
            <select name="approval" id="approval" class="form-control">
                  <option value="0" selected>Approved</option>
                  <option value="1">Rejected</option>
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
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary update_approval">Update</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
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

@section('script')

<script>
  var can_edit = false;
  var can_delete = false;
  @can('User Edit')
    can_edit = true;
  @endcan
  @can('User Delete')
    can_delete = true;
  @endcan
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


      getUsers();
        function getUsers() {
          //alert("working");
            $.ajax({
                type: "GET",
                url: "{{ url('users') }}",
                dataType: "json",
                success: function (response) {
                    $('tbody').html("");
                    var counter = 1;
                    $.each(response.users, function (key, item) {
                        let tr_html=`<tr>
                            <td>` +counter+ `</td>
                            <td>` + item.name + `</td>
                            <td>` + item.mobileno + `</td>
                            <td>` + item.roles[0].name + `</td>
                            <td style="text-align: right;">`;
                            if(can_edit){
                              tr_html+=`<button type="button" value="` + item.id + `" class="btn btn-info editbtn btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>`;
                            }
                            tr_html+=`</tr>`;
                        $('tbody').append(tr_html);
                         counter++;
                    });
                }
            });
        }


    $('#btn-user-model').click(function(){
      $('#addModal').modal('show');
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
        $('#ddl-ward').attr('required',true);
      }else if(role==5){ // booth
        $('#div-gali').hide();
        $('#div-mandal,#div-ward,#div-booth').show();
        $('#ddl-ward,#ddl-booth').attr('required',true);
      }else if(role==6){ // gali
        $('#div-mandal,#div-ward,#div-booth,#div-gali').show();
        $('#ddl-ward,#ddl-booth,#ddl-gali').attr('required',true);
      }
    });

    $('#ddl-mandal').change(function(){
      let mandal_id = $(this).val();
      let ward_opt = `<option value=''>Select Ward</option>`;
      if(mandal_id!=''){
        $.ajax({
          "url":"{{ url('get-wards') }}/"+mandal_id,
          "type":"GET",
          "success":function(response){
            if(response.status==200){
              let wards = response.wards;
              for (var i = 0; i < wards.length; i++) {
                ward_opt +=`<option value='`+wards[i].id+`'>`+wards[i].name+`</option>`;
              }
              $('#ddl-ward').html(ward_opt);
            }else{
              notification('danger',response.error);
            }
          },error:function(error){
            notification('danger','Oops! Something went wrong');
          }

        });
      }else{
        $('#ddl-ward').html(`<option value=''>Select Ward</option>`);
      }
    });

    $('#ddl-ward').change(function(){
      let ward_id = $(this).val();
      let booth_opt = `<option value=''>Select Bhoth</option>`;
      //alert(ward_id);
      if(ward_id!=''){
        $.ajax({
          "url":"{{ url('get-booths') }}/"+ward_id,
          "type":"GET",
          "success":function(response){
            if(response.status==200){
              let booth = response.booths;
              for (var i = 0; i < booth.length; i++) {
                booth_opt +=`<option value='`+booth[i].id+`'>`+booth[i].name+`</option>`;
              }
              $('#ddl-booth').html(booth_opt);
            }else{
              notification('danger',response.error);
            }
          },error:function(error){
            notification('danger','Oops! Something went wrong');
          }

        });
      }else{
        $('#ddl-booth').html(`<option value=''>Select Booth</option>`);
      }
    });

    $('#ddl-booth').change(function(){
      let booth_id = $(this).val();
      let gali_opt = `<option value=''>Select Gali</option>`;
      //alert(booth_id);
      if(booth_id!=''){
        $.ajax({
          "url":"{{ url('get-galies') }}/"+booth_id,
          "type":"GET",
          "success":function(response){
            if(response.status==200){
              let gali = response.galies;
              for (var i = 0; i < gali.length; i++) {
                gali_opt +=`<option value='`+gali[i].id+`'>`+gali[i].name+`</option>`;
              }
              $('#ddl-gali').html(gali_opt);
            }else{
              notification('danger',response.error);
            }
          },error:function(error){
            notification('danger','Oops! Something went wrong');
          }

        });
      }else{
        $('#ddl-gali').html(`<option value=''>Select Gali</option>`);
      }
    });


       /*$('#pending-approval-form').on('submit', function(e) {
            e.preventDefault();
            //check form submit is store or update
            let pending_approval_id = $('#pending-approval-id').val();
            //alert(pending_approval_id);
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
                     console.log(response);
                    if (response.status == 400) {
                       console.log(response);
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                          $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    } else if(response.status == 200) {
                        notification('success',response.message);

                        $('#pending-approval-form')[0].reset();
                        $('#pending-approval-id').val('');
                        getUsers();
                    }else{
                      notification('danger',response.error,5000);
                      console.log(response.error);
                    }
                }
            });

        });*/

       $('#pending-approval-form').on('submit', function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ url('users') }}",
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
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#pending-approval-form')[0].reset();
                        $('#addModal').modal('hide');
                        notification('success',response.message,3000);
                        getUsers();
                    }else{
                      notification('danger',response.error,10000);
                    }
                }
            });

        });

 /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var user_id = $(this).val();
            //alert('working');
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-pending-approval/" + user_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        console.log(response.user.name);
                        console.log(response.user.mobileno);
                        $('#edit_name').val(response.user.name);
                        $('#edit_mobileno').val(response.user.mobileno);
                        $('.role').val(response.user.designation);
                        $('.role_mandal').val(response.user.role_mandal);
                        $('.ward_id').val(response.user.ward_id);
                        $('.booth_id').val(response.user.booth_id);
                        $('.gali_id').val(response.user.gali_id);
                        $('#user-id').val(user_id);
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
                'designation': $('#ddl-role').val(),
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
                    console.log(response);
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
                        getUsers();
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
                        getUsers();
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

<!--  -->
@endsection

