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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Permission</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard task_status">
  <div class="volunter_list">
    <div class="row">
    <div class="col-lg-12">
     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
      @endif
      <div class="card">
        <div class="search_box house_data">
            <div class="input-group">
              <a href="{{ url('permission/create') }}" class="btn btn-outline-primary"><i class="fa fa-plus" style="margin-right: 6px;"></i> Add Permission</a>
            </div>
          </div>
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Permission List
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
                <th>S.No</th>
                <th>Name</th>
                <th style="text-align:right;">Action</th>
              </tr>
            </thead>
            <tbody id="message-tbody">
              @foreach ($permissions as $permission)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $permission->name }}</td>
                    <td style="text-align:right;">
                    <form action="{{ route('permission.destroy',$permission->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary edit_btn" href="{{ route('permission.edit',$permission->id) }}" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>
                    <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>                    
                    </form>
                    
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
          {!! $permissions->links() !!}
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
            </div>
            <div class="modal-footer">
                <form action="{{ route('permission.destroy',$permission->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Yes Delete</button>
                </form>
                <button type="button" class="btn btn-cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

@endsection

@section('script')
<script>
$('select').selectpicker();
</script>

<!-- /* search function */ -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#message-tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
 <!-- /* search function */ -->

<script>
    /* delete  */

        $(document).on('click', '.deletebtn', function () {
            var permission_id = $(this).val();
            alert(permission_id);
            $('#DeleteModal').modal('show');
        });

       /* delete  */
</script>


@endsection