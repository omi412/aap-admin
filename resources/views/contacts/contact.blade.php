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
          @can('Contact Create')
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add Contact</a>
            </div>
          @endcan  
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
                <th>Name</th>
                <th>Address</th>
                
                <th>User Type</th>
                <th style="text-align: right;">Action</th>
              </tr>
            </thead>
            <tbody id="myTable">
            
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
          <i class="fa fa-align-justify"></i><span id="spn-title">Add Contact</span>
        </div>
        <div class="card-body pending_approval">
          <form id="contact" name="postForm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="" id="edit-form-method">
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">House</label>
              </div>
              <div class="col-md-9">
                <input type="hidden" id="edit-contact-id" value="" />
                <select class="form-control" name="house_id" id="select-state1" placeholder="Pick a House..." required >
                  <option value>Select House</option>
                  @foreach($house_data as $key)
                    <option value="{{$key->id}}">{{ $key->owner }} - {{ $key->address_line_1 }} (ward-{{ $key->ward }})</option>
                  @endforeach
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">First Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="firstname" name="first_name" aria-describedby="firstname" placeholder="First Name" required >
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">Last Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="last_name" id="lastname" placeholder="Last Name">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Gender</label>
              </div>
              <div class="col-md-9">
                <select class="form-control" name="gender" id="gender" required >
                    <option value >Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Age</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age" required >
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">User Type</label>
              </div>
              <div class="col-md-9">
                <select class="form-control" name="user_type" id="user-type" required >
                    <option value="0" selected>Public</option>
                    <option value="1">Volunteer</option>
                </select>
              </div>
              </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" id="btn-submit" class="btn btn-success">Submit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Contact </h5>
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
  @can('Contact Edit')
    can_edit = true;
  @endcan
  @can('Contact Delete')
    can_delete = true;
  @endcan

  $(document).ready(function () {
      $('#select-state').selectize({
          sortField: 'text'
      });
  });
  
  $("#show_second").click(function(){
    $("#section_first").hide();
    $("#section_second").show();
    $('#btn-submit').text('Submit');
    $('#spn-title').text('Add Contact');
    $('#edit-contact-id').val('');
    $('#edit-form-method').val('');
  });

  $("#show_first").click(function(){
    $("#section_second").hide();
    $("#section_first").show();
  });

</script>


<script type="text/javascript">

  $(document).ready(function () {

      fetchContact();

        function fetchContact() {
          let usetType = ['Public','Volunteer'];
          //alert("working");
            $.ajax({
                type: "GET",
                url: "/fetch-contacts",
                dataType: "json",
                success: function (response) {
                     console.log(response);
                    $('tbody').html("");
                    let counter = 1;
                    $.each(response.contacts, function (key, item) {
                        let tr_html = `<tr>
                            <td>` + counter + `</td>
                            <td>` + item.first_name + ` ` + item.last_name + `</td>
                            <td>` + item.house_data.house_no+' '+item.house_data.address_line_1+' ward - '+item.house_data.ward+ `</td>
                            <td>` + usetType[item.user_type] + `</td>
                            <td style='text-align:right'>`;
                            if(can_edit){
                              tr_html+=`<button type="button" value="` + item.id + `" class="btn btn-info editbtn btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>`;
                            }
                            if(can_delete){
                              tr_html+=`<button type="button" value="` + item.id + `" class="btn btn-danger deletebtn btn-sm" title="Delete"><i class="fa fa-trash"></i></button>`;
                            }
                            
                            tr_html+=`</td></tr>`;
                            
                        $('tbody').append(tr_html);
                        counter++;
                    });
                }
            });
        }

        $('#contact').on('submit', function(e) {
            e.preventDefault();
            let url = "{{ url('contacts') }}";
            let method = "POST";
            if($('#edit-contact-id').val()!=''){ // update case
              url = "{{ url('update-contact') }}/"+$('#edit-contact-id').val();
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

                        $('#contact')[0].reset();
                        notification('success',response.message);
                        $('#section_second').hide();
                        $('#section_first').show();
                        fetchContact();

                    }else{
                      notification('danger',response.error,5000);
                    }
                }
            });

        });

       /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var contact_id = $(this).val();
            //alert(volunteer_id);
            $('#section_second').show();
            $('#section_first').hide();
            $('#btn-submit').text('Update');
            $('#spn-title').text('Edit Task');
            $('#edit-form-method').val('PUT');
            $.ajax({
                type: "GET",
                url: "{{ url('edit-contact') }}/" + contact_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        var contactData = response.contact;
                        
                        $('#select-state1').val(contactData.house_id);
                        $('#firstname').val(contactData.first_name);
                        $('#lastname').val(contactData.last_name);
                        $('#gender').val(contactData.gender);
                        $('#age').val(contactData.age);
                        $('#user_type').val(contactData.user_type);
                        $('#edit-contact-id').val(contact_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

       /* edit ajax*/

       /* delete volunteer */

        $(document).on('click', '.deletebtn', function () {
            var contact_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(contact_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var contact_id = $('#deleteing_id').val();
            //alert(task_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-contact/" + contact_id,
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
                        fetchContact();
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
