@extends('layouts/master')
@section('head')

@endsection
@section('content')
        
<cui-breadcrumb>
  <ol class="breadcrumb">
    <li class="breadcrumb-item" ng-reflect-ng-class="[object Object]">
      <a ng-reflect-router-link="/" href="{{ url('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item active" ng-reflect-ng-class="[object Object]">
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Booths</span>
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
            <div class="input-group">
             
               <a href="javascript:void(0)" id="addNewBook" class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 10px;"></i><span id="btn-user-model">Add Booth</span></a>
             
            </div>
         
        </div>
      <div class="card pen_appr">
        <div class="card-header">
          <i class="fa fa-align-justify"></i>Booths
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
                  <th scope="col">S No.</th>
                  <th scope="col">Ward Name</th>
                  <th scope="col">Booth Name</th>
                  <th scope="col" style="text-align: right;">Action</th>
                </tr>
              </thead>
              <tbody id="myTable"> 
                @foreach ($booths as $booth)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $booth->parent_id }}</td>
                    <td> {{ $booth->name }}</td>
                    <td style="text-align: right;">
                       <button type="button" data-id="{{ $booth->id }}" class="btn btn-info edit btn-sm" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>
                      <button type="button" data-id="{{ $booth->id }}" class="btn btn-danger delete btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>
</div>

<!-- boostrap model -->
    <div class="modal fade" id="ajax-book-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxBookModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="role_id" id="role_id">
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Ward Name</label>
                <div class="col-sm-12">
                  <select name="parent_id" id="ddl-ward" class="form-control volunteer">
                      <option value="">Select Ward</option>
                      @foreach($wards as $ward)
                      <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div> 
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Booth Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="title" name="name" placeholder="Enter Booth Name" value="" maxlength="50" required="">
                </div>
              </div>  
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>


<!-- end bootstrap model -->


@endsection

@section('script')

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

<script type="text/javascript">
 $(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addNewBook').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#ajaxBookModel').html("Add Booth");
       $('#ajax-book-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-booth') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Booth");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#title').val(res.name);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-booth') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              window.location.reload();
           }
        });
       }
    });
    $('body').on('click', '#btn-save', function (event) {
          let id = $('#id').val();
          var title = $("#title").val();
            let url = "{{ url('add-update-booth') }}";
  
            if(id!=''){
              url = "{{ url('update-booth') }}/"+id;
            }
          
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: url,
            data: $('#addEditBookForm').serialize(),
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });
});
</script>

@endsection