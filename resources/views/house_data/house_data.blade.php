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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">House Data</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list">
    <div class="row" id="section_first">
    <div class="col-lg-12">
      <div class="card">
         <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary show_second"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add House Data</a>
              <a href="javascript:void(0)" id="show_third" class="btn btn-outline-info show_third"><i class="fa fa-download" style="margin-right: 6px;"></i> House Data Import</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> House Data 
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
                <th>Owner </th>
                <th>House No.</th>
                <th>Address</th>
                <th>Ward</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="myTable">
              
            </tbody>
          </table>
          </div>
        </div>
      </div>
  </div><!--/.row-->
    <div class="row" id="section_second" style="display: none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-primary show_first"><i class="fa fa-list" style="margin-right: 6px;"></i> House Data List</a>
              <a href="javascript:void(0)" id="show_third" class="btn btn-outline-info show_third"><i class="fa fa-download" style="margin-right: 6px;"></i> House Data Import</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> House Data 
        </div>
        <div class="card-body pending_approval">
          <form action="POST" id="house-data-form">
            @csrf
            <input type="hidden" name="house_data_id" id="house-data-id" value="">
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name">Owner</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="owner" id="owner" aria-describedby="emailHelp" placeholder="Enter Name" required >
                <!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password1">House No.</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="house_no" id="house_no" placeholder="Enter House No." required >
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Address line 1</label>
              </div>
              <div class="col-md-9">
               <textarea class="form-control" name="address_line_1" id="address_line_1" required placeholder="Address Line 1"></textarea>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Address line 2</label>
              </div>
              <div class="col-md-9">
               <textarea class="form-control" name="address_line_2" id="address_line_2" placeholder="Address Line 2"></textarea>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Ward</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" id="ward" name="ward" placeholder="Ward" required >
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                <label for="password1">Remarks</label>
              </div>
              <div class="col-md-9">
               <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks"></textarea>
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
    </div><!--/.row-->
     <div class="row" id="section_third" style="display: none;">
    <div class="col-lg-12">
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="javascript:void(0)" id="show_second" class="btn btn-outline-primary show_second"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add House Data</a>
              <a href="javascript:void(0)" id="show_first" class="btn btn-outline-info show_first"><i class="fa fa-list" style="margin-right: 6px;"></i> House Data List</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Import House Data 
        </div>
        <div class="card-body pending_approval upload_house">
          <div class="box-fileupload">
                <input type="file" id="fileId" class="file-upload-input" name="files" multiple>
                <label for="fileId" class="file-upload-btn"></label>
                <p class="box-fileupload__lable">Drop files here to upload</p>
            </div>
            <div class="error-wrapper"></div>
            <div class="image-previwe"></div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Import</button>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
  </div>
</div>

  {{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete House Data </h5>
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
  
  $(".show_second").click(function(){
    $("#section_first").hide();
    $("#section_third").hide();
    $("#section_second").show();
  });

  $(".show_third").click(function(){
    $("#section_second").hide();
    $("#section_first").hide();
    $("#section_third").show();
  });

  $(".show_first").click(function(){
    $("#section_second").hide();
    $("#section_third").hide();
    $("#section_first").show();
  });

  $(document).ready(function(){
    fetchHouseData();

        function fetchHouseData() {
          //alert("working");
            $.ajax({
                type: "GET",
                url: "{{ route('house-data.index') }}",
                dataType: "json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.house_data, function (key, item) {
                        $('tbody').append(`<tr>
                            <td>` + item.id + `</td>
                            <td>` + item.owner + `</td>
                            <td>` + item.house_no + `</td>
                            <td>` + item.address_line_1 +` `+item.address_line_2+ `</td>
                            <td>` + item.ward + `</td>
                            <td><button type="button" value="` + item.id + `" class="btn btn-info editbtn btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>
                            <button type="button" value="` + item.id + `" class="btn btn-danger deletebtn btn-sm" title="Delete"><i class="fa fa-trash"></i></button></td>
                          </tr>`);
                    });
                }
            });
        }

       $('#house-data-form').on('submit', function(e) {
            e.preventDefault();
            //check form submit is store or update
            let house_data_id = $('#house-data-id').val();
            let url = "{{ route('house-data.store') }}";
  
            if(house_data_id!=''){
              url = "{{ url('update-house-data') }}/"+house_data_id;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: $('#house-data-form').serialize(),
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

                        $('#house-data-form')[0].reset();
                        $('#section_second').hide();
                        $('#section_first').show();
                        $('#btn-submit').text('Save');
                        $('#house-data-id').val('');
                        fetchHouseData();
                    }else{
                      notification('danger',response.error,5000);
                    }
                }
            });

        });

       /* edit ajax*/

       $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var house_data_id = $(this).val();
        //alert(volunteer_id);
        $('#section_second').show();
        $('#section_first').hide();
        $('.sub_task').hide();
        $('.update_task').show();
        $.ajax({
            type: "GET",
            url: "{{ url('house-data') }}/" + house_data_id+'/edit',
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editModal').modal('hide');
                } else {
                     //console.log(response.taskStatus.task_title);
                    $('#owner').val(response.house_data.owner);
                    $('#house_no').val(response.house_data.house_no);
                    $('#address_line_1').val(response.house_data.address_line_1);
                    $('#address_line_2').val(response.house_data.address_line_2);
                    $('#ward').val(response.house_data.ward);
                    $('#remarks').val(response.house_data.remarks);
                    $('#house-data-id').val(response.house_data.id);
                    $('#btn-submit').text('Update');
                }
            }
        });
        $('.btn-close').find('input').val('');

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
                        fetchHouseData();
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
