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
      <span tabindex="0" ng-reflect-router-link="//dashboard/">Hierarchy</span>
    </li>
  </ol>
</cui-breadcrumb>

<div class="animated fadeIn dashboard">
  <div class="row">
    <div class="col-md-12">
      <div class="body genealogy-body genealogy-scroll">
        <div class="welcome_div">
        <h2>Hierarchy</h2>
      </div>
        <div class="genealogy-tree">
            <ul>
                <li>
                    <a href="javascript:void(0);" id="show_child">
                      <div class="member-view-box">
                        <div class="member-image">
                          <img src="{{ asset ('assets/images/hierarchy/Manish-Sisdoia.jpg')}}" alt="Member">
                        </div>
                        <div class="member-details">
                          <h3>Manish Sisodia</h3>
                        </div>
                      </div>
                    </a>
                    <ul class="active" class="hierarchy_child" id="section_child_status" style="display: none;">
                        @foreach($mandals as $mandal)
                        <li id="ddl-mandal">
                            <a href="javascript:void(0);" id="show_child2" class="show_childs">
                            <input type="hidden" name="role_mandal" value="{{ $mandal->id }}" class="mandal_val">
                            <div class="member-view-box">
                              <div class="member-image">
                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                              </div>
                              <div class="member-details">
                                  <h3>{{ $mandal->name }}</h3>
                              </div>
                            </div>
                            </a>
                            <ul class="child2_status"  id="ddl-ward">

                            </ul>
                        </li>
                       @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </div><!--/.col-->
  </div>
</div>

<style>
  #ddl-gali a{
    cursor: default;
  }
</style>


@endsection

@section('script')

<script>

  $("#show_child").click(function(){
    $("#section_child_status").show();
    $("#section_child2_status").hide();
    $("#section_child3_status").hide();
    $("#section_child4_status").hide();
  });

  $("#show_child2").click(function(){
    $("#section_child2_status").show();
    $("#section_child3_status").hide();
    $("#section_child4_status").hide();
  });

  $("#show_child3").click(function(){
    $("#section_child3_status").show();
    $("#section_child2_status").hide();
    $("#section_child4_status").hide();
  });

  $("#show_child4").click(function(){
    $("#section_child4_status").show();
    $("#section_child3_status").hide();
    $("#section_child2_status").hide();
  });

$(document).ready(function(){
      //let mandal_id = $('.mandal_val').val();
      $(document).on('click', '.show_childs', function () {
      var mandal_id = $(this).find('.mandal_val').val();
      //$("#setindex").val(index);
      //alert(mandal_id);
      let ward_opt = ``;
      if(mandal_id!=''){
        $.ajax({
          "url":"{{ url('get-wards') }}/"+mandal_id,
          "type":"GET",
          "success":function(response){
            if(response.status==200){
              let wards = response.wards;
              for (var i = 0; i < wards.length; i++) {
                ward_opt +=`<li>
                            <a href="javascript:void(0);" class="show_booth">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                  </div>
                                    <div class="member-details">
                                      <input type="hidden" class="ward_val" name="role_ward" value="`+wards[i].id+`">
                                        <h3>`+wards[i].name+`</h3>
                                    </div>
                                </div>
                        </a><ul class="child2_status" id="ddl-booth" style="display:none;"></ul></li>`;
              }
              $('#ddl-ward').html(ward_opt);
              //$('#ddl-mandal li.active').removeClass('active');
              //$('#ddl-mandal li').addClass('active');
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

     $(document).on('click', '.show_booth', function () {
      var ward_id = $(this).find('.ward_val').val();
      //$("#setindex").val(index);
      //alert(ward_id);
      let booth_opt = ``;
      //alert(ward_id);
      if(ward_id!=''){
        $.ajax({
          "url":"{{ url('get-booths') }}/"+ward_id,
          "type":"GET",
          "success":function(response){
            if(response.status==200){
              let booth = response.booths;
              for (var i = 0; i < booth.length; i++) {
                booth_opt +=`<li>
                            <a href="javascript:void(0);" class="show_gali">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                  </div>
                                    <div class="member-details">
                                      <input type="hidden" class="booth_val" name="role_ward" value="`+booth[i].id+`">
                                        <h3>`+booth[i].name+`</h3>
                                    </div>
                                </div></a><ul class="child2_status"  id="ddl-gali" style="display:none;"></ul></li>`;
              }
              $('#ddl-booth').html(booth_opt);
              $('#ddl-booth').show();
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

     $(document).on('click', '.show_gali', function () {
      var booth_id = $(this).find('.booth_val').val();
      //$("#setindex").val(index);
      //alert(booth_id);
      let gali_opt = ``;
      //alert(booth_id);
      if(booth_id!=''){
        $.ajax({
          "url":"{{ url('get-galies') }}/"+booth_id,
          "type":"GET",
          "success":function(response){
            if(response.status==200){
              let gali = response.galies;
              for (var i = 0; i < gali.length; i++) {
                gali_opt +=`<li>
                            <a href="javascript:void(0);" class="">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                  </div>
                                    <div class="member-details">
                                      <input type="hidden" class="gali_val" name="role_ward" value="`+gali[i].id+`">
                                        <h3>`+gali[i].name+`</h3>
                                    </div>
                                </div>
                        </a></li>`;
              }
              $('#ddl-gali').html(gali_opt);
              $('#ddl-gali').show();
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

    });
</script>
@endsection
