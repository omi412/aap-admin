<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('assets/images/aap_logo.png')}}">
    <link href="{{ asset ('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/css/custom.css')}}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100 login">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5 mx-auto">
                  <div class="card-group">
                    <div class="card p-4">
                      <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
                      <div class="card-body">
                          <div class="logo">
                            <img src="{{ asset ('assets/images/aap_logo.png')}}" class="img" alt="admin"/>
                          </div>
                          <form>
                          <!-- <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }} -->
                              <div class="input-group mb-3">
                                <label for="mobileno" class="phone_label">Phone No.</label>
                                <input type="text" class="form-control" name="mobileno" placeholder="Enter Phone No." id="number" value="{{ old('mobileno') }}" required autofocus>
                                @if ($errors->has('mobileno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobileno') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <div class="row">
                                <div class="col-5 text-left mobile" style="padding: 0px;">
                                  
                                </div>
                                <div class="col-7 text-right">
                                  <a href="{{ route('register') }}" class="btn btn-primary mt-3">Register</a>
                                  <button type="submit" class="btn btn-primary px-4 mt-3" onclick="phoneSendAuth();">Login</button></a>
                                </div>
                            </div>
                        </form> 
                        <div class="card" style="margin-top: 10px">

                              <div class="card-header">

                                Enter Verification code

                              </div>

                              <div class="card-body">

                          

                                <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>

                          

                                <form>

                                    <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">

                                    <button type="button" class="btn btn-success" onclick="codeverify();">Verify code</button>

                          
                                </form>

                              </div>

                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>



    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset ('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{ asset ('assets/js/quixnav-init.js')}}"></script>
    <script src="{{ asset ('assets/js/custom.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

  

<script>

      

  var firebaseConfig = {

  apiKey: "AIzaSyDKtYOGeBpgJ1sIDdMLzV4cBeMIgl0WxZ0",

  authDomain: "aap-admin.firebaseapp.com",

  projectId: "aap-admin",

  storageBucket: "aap-admin.appspot.com",

  messagingSenderId: "948598536979",

  appId: "1:948598536979:web:a48f2fa72f3710db7b38e6",

  measurementId: "G-X5P4P1ES26"


  };

    

  firebase.initializeApp(firebaseConfig);

</script>

  

<script type="text/javascript">

    function phoneSendAuth() {

           

        var number = $("#number").val();

          

        firebase.auth().signInWithPhoneNumber(number).then(function (confirmationResult) {

              

            window.confirmationResult=confirmationResult;

            coderesult=confirmationResult;

            console.log(coderesult);

  

            $("#sentSuccess").text("Message Sent Successfully.");

            $("#sentSuccess").show();

              

        }).catch(function (error) {

            $("#error").text(error.message);

            $("#error").show();

        });

  

    }

  

    function codeverify() {

  

        var code = $("#verificationCode").val();

  

        coderesult.confirm(code).then(function (result) {

            var user=result.user;

            console.log(user);

  

            $("#successRegsiter").text("you are register Successfully.");

            $("#successRegsiter").show();

  

        }).catch(function (error) {

            $("#error").text(error.message);

            $("#error").show();

        });

    }

  

</script>

</body>

</html>