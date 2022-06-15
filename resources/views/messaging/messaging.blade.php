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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Messaging</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  @can('Messaging Send')
  <div class="row" *ngIf="(activeUser=='admin')">
    <div class="col-md-12">
      <div class="volunter msg">
        <div id="success_message" style="margin: 20px 0px;"></div>
      </div>
      <div class="card volunter">
        <div class="card-header">
         <i class="fa fa-align-justify"></i> Messages
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-sm-6 col-lg-12">
            <div class="volunter_add messaging">
              <ul id="save_msgList"></ul>
                <form id="messaging-form" method="POST">
                  @csrf
                  <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Message</label>
                    </div>
                    <div class="col-md-9">
                      <textarea name="message" required id="message" class="message" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="password1">Send to</label>
                    </div>
                    <div class="col-md-9">
                      <!-- <select class="selectpicker send_to" required id="ddl-send" name="send_to[]" multiple data-live-search="true">
                          @foreach(getRoles() as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                      </select> -->
                      <select class="send_to" id="ddl-role" name="send_to" required>
                          <option value="">Select Volunteer Type</option>
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

                      <select name="mandal_id" id="ddl-mandal" class="volunteer">
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

                      <select name="ward_id" id="ddl-ward" class="volunteer">
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

                      <select name="booth_id" id="ddl-booth" class="volunteer">
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

                    <select name="gali_id" id="ddl-gali" class="volunteer">
                      <option value="">Select Gali</option>
                      @foreach($galies as $gali)
                      <option value="{{ $gali->id }}">{{ $gali->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
                <!-- <div class="send_label">
                    <label>Send to</label>
                  </div> -->
                  <div class="add-btns">
                    <button class="btn add-btn" type="submit"><i class="fa fa-location-arrow" style="margin-right: 6px;"></i>Send</button>
                  </div>
                </form>
            </div>
          </div><!--/.col-->
        </div><!--/.row-->
        </div>
      </div>
    </div><!--/.col-->
  </div>
  @endcan
  <div class="volunter_list">
    <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Message History
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
                <th>Message</th>
                <th>Date</th>
                <th>Sent to</th>
              </tr>
            </thead>
            <tbody id="message-tbody">
              
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
  </div>
  <div class="modal fade pending_approval" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="POST" id="pending-approval-form">
            @csrf
           <input type="hidden" name="message_id" id="message-id" value="">
          <div class="form-group row">
          <div class="col-md-12">
            <textarea class="form-control" readonly cols="12" rows="4" id="txt-message"></textarea>
          </div>
          </div>
          </form>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

@endsection

@section('script')
<!-- <script>
$('select').selectpicker();
</script> -->


<script type="text/javascript">

$(document).ready(function () {
//alert('working');
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

    fetchMessaging();     

  function fetchMessaging() {
    //alert('working');
      $.ajax({
          type: "GET",
          url: "{{ url('fetch-messaging') }}",
          dataType: "json",
          success: function (response) {
            let messages = response.messages;
              console.log(response);
              $('#message-tbody').html("");
              var counter = 1;
              let table_html = ``;
  
              for (var i = 0; i < messages.length; i++) {
                table_html+=`<tr>
                  <td>`+counter+`</td>
                  <td><a href="#" class="show-message" style="color: #000;"  data-message="`+messages[i].message+`">`+messages[i].message+`</a></td>
                  <td>`+messages[i].send_date+`</td>
                  <td>`+messages[i].role.name+`</td>
                  </tr>`;

                counter++;
              }
              console.log(messages);
              $('#message-tbody').html(table_html);
          }
      });
  }
   
    $('#messaging-form').on('submit', function(e) {
          e.preventDefault();

          $.ajax({
              type: "POST",
              url: "{{ url('messaging') }}",
              data: $('#messaging-form').serialize(),
              dataType: "json",
              success: function (response) {
                  if (response.status == 400) {
                      $('#save_msgList').html("");
                      $('#save_msgList').addClass('alert alert-danger');
                      $.each(response.errors, function (key, err_value) {
                          $('#save_msgList').append('<li>' + err_value + '</li>');
                      });
  
                  } else if(response.status==200) {
                    notification('success',response.message);
                     $('#messaging-form')[0].reset();
                     fetchMessaging();
                  }else{
                    notification('danger',response.error,5000);
                  }
              }
          });

    });


    $(document).on('click', '.show-message', function (e) {
      e.preventDefault();
      $('#txt-message').text($(this).attr('data-message'));
      $('#form_modal').modal('show');
            // var message_id = $(this).data('id');
            // $('#form_modal').modal('show');
            // $.ajax({
            //     type: "GET",
            //     url: "/edit-messaging/" + message_id,
            //     dataType: "json",
            //     success: function (response) {
            //         if (response.status == 404) {
            //             $('#success_message').addClass('alert alert-success');
            //             $('#success_message').text(response.message);
            //             $('#form_modal').modal('hide');
            //         } else {
            //             //console.log(response.user.name);
            //             console.log(response.all_message.id);
            //             $('#message_div').val(response.all_message.message);
            //             $('#message-id').val(message_id);
            //         }
            //     }
            // });
            // $('.btn-close').find('input').val('');

        });

       /* edit ajax*/

  });

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



@endsection