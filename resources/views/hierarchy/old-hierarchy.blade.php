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
                        <li>
                            <a href="javascript:void(0);" id="show_child2">
                            <div class="member-view-box">
                              <div class="member-image">
                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                              </div>
                              <div class="member-details">
                                  <h3>Ward 1</h3>
                              </div>
                            </div>
                            </a>
                            <ul class="child2_status" id="section_child2_status" style="display: none;" >
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                            <div class="member-image">
                                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                              </div>
                                                <div class="member-details">
                                                    <h3>Mandal Prabhari</h3>
                                                </div>
                                            </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                            <div class="member-image">
                                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                              </div>
                                                <div class="member-details">
                                                    <h3>Mandal Prabhari</h3>
                                                </div>
                                            </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" id="show_child3">
                                        <div class="member-view-box">
                                            <div class="member-image">
                                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                              </div>
                                                <div class="member-details">
                                                    <h3>Mandal Prabhari</h3>
                                                </div>
                                            </div>
                                      
                                    </a>
                                    <ul class="child3_status" id="section_child3_status"  style="display: none;">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                      </div>
                                                        <div class="member-details">
                                                            <h3>Mandal Prabhari</h3>
                                                        </div>
                                                    </div>
                                          
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                      </div>
                                                        <div class="member-details">
                                                            <h3>Mandal Prabhari</h3>
                                                        </div>
                                                    </div>
                                               
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                      </div>
                                                        <div class="member-details">
                                                            <h3>Mandal Prabhari</h3>
                                                        </div>
                                                   
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" id="show_child4">
                                        <div class="member-view-box">
                                            <div class="member-image">
                                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                              </div>
                                                <div class="member-details">
                                                    <h3>Mandal Prabhari 4</h3>
                                                </div>
                                            </div>
                                       
                                    </a>
                                    <ul id="section_child4_status" style="display: none;"> 
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                      </div>
                                                        <div class="member-details">
                                                            <h3>Mandal Prabhari</h3>
                                                     
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                      </div>
                                                        <div class="member-details">
                                                            <h3>Mandal Prabhari</h3>
                                                        </div>
                                                   
                                                </div>
                                            </a>
                                            <ul id="section_child5_status">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                              </div>
                                                                <div class="member-details">
                                                                    <h3>Mandal Prabhari</h3>
                                                                </div>
                                                         
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                              </div>
                                                                <div class="member-details">
                                                                    <h3>Mandal Prabhari</h3>
                                                                </div>
                                                        
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                              </div>
                                                                <div class="member-details">
                                                                    <h3>Mandal Prabhari</h3>
                                                                </div>
                                                            
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                      </div>
                                                        <div class="member-details">
                                                            <h3>Mandal Prabhari</h3>
                                                        </div>
                                                    </div>
                                                
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                          <a href="javascript:void(0);" id="show_child4">
                            <div class="member-view-box">
                              <div class="member-image">
                                <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                              </div>
                              <div class="member-details">
                                <h3>Ward 2</h3>
                              </div>
                            </div>
                          </a>
                            <ul class="child4_status" id="section_child4_status" style="display: none;">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                          <div class="member-image">
                                            <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                          </div>
                                          <div class="member-details">
                                            <h3>Mandal Prabhari</h3>
                                          </div>
                                        </div>
                                    </a>
                                  <ul style="display: none;">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                  <div class="member-image">
                                                    <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                  </div>
                                                  <div class="member-details">
                                                    <h3>Mandal Prabhari</h3>
                                                  </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                               <div class="member-view-box">
                                                <div class="member-image">
                                                  <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                </div>
                                                <div class="member-details">
                                                  <h3>Mandal Prabhari</h3>
                                                </div>
                                              </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                  <div class="member-image">
                                                    <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                                  </div>
                                                  <div class="member-details">
                                                    <h3>Mandal Prabhari</h3>
                                                  </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                          <div class="member-image">
                                            <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                          </div>
                                          <div class="member-details">
                                            <h3>Mandal Prabhari</h3>
                                          </div>
                                        </div>
                                    </a>
                                    
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                          <div class="member-image">
                                            <img src="{{ asset ('assets/images/hierarchy/Circle-icons-profile.png')}}" alt="Member">
                                          </div>
                                          <div class="member-details">
                                            <h3>Mandal Prabhari</h3>
                                          </div>
                                        </div>
                                    </a>
                                  
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </div><!--/.col-->
  </div>
</div>



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
    $("#section_child2_status").show();
    $("#section_child4_status").hide();
  });

  $("#show_child4").click(function(){
    $("#section_child4_status").show();
    $("#section_child3_status").hide();
    $("#section_child2_status").show();
  });

</script>
@endsection
