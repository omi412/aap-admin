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
                      <div class="alert alert-danger" id="error" style="display: none;"></div>
                      <div class="card-body">
                         <div class="logo">
                            <img src="{{ asset ('assets/images/aap_logo.png')}}" class="img" alt="admin"/>
                         </div>
                         <div class="container">
                            <!-- <div class="alert alert-danger hide" id="error-message" style="display:none;"></div>
                            <div class="alert alert-success hide" id="sent-message" style="display:none;"></div> -->
                            <div class="card">
                               <div class="card-body">
                                <div id="res-msg"></div>
                                  <form class="form-horizontal" method="POST" action="{{ route('signup') }}">
                                       {{ csrf_field() }}
                                       
                                          <div class="mb-3">
                                             <!-- <label for="phone-number" class="form-label">Phone Number:</label> -->
                                             <input type="text" name="mobileno" id="phone-number" class="form-control" placeholder="(+91) Enter your mobile no">
                                             <span id="spn-err-mobile" class="err-msg"></span>
                                          </div>
                                          
                                          
                                          <div class="input-group mb-3" id="div-otp-code" style="display: none;">
                                             <!-- <label for="otp-code" class="form-label">OTP code:</label> -->
                                             <input type="text" id="otp-code" class="form-control" placeholder="Enter OTP code">
                                             <span id="spn-err-otp" class="err-msg"></span>
                                          </div>
                                          <div class="input-group mb-3" id="div-name" style="display: none;">
                                             <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                                            <span id="spn-err-name" class="err-msg"></span>
                                          </div>
                                          <div class="input-group mb-3">
                                            <div id="recaptcha-container"></div>
                                          </div>  
                                          <div class="row">
                                             <div class="col-5 text-left mobile" style="padding: 0px;">
                                             </div>
                                             <div class="col-12 text-center">
                                                <button type="submit" id="btn-submit" class="btn btn-primary mt-3" >Register</button>
                                                <button type="button" id="btn-get-otp" class="btn btn-primary px-4 mt-3" onclick="otpSend();">Get OTP</button>
                                                <button type="button" id="btn-verify-otp" class="btn btn-primary px-4 mt-3" onclick="otpVerify();">Verify OTP</button>
                                             </div>
                                          </div>
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

    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script type="text/javascript">
        const config = {
            apiKey: "AIzaSyBcHRKF1jNLB0iTaTjw3T73iglivfH4bVI",
            authDomain: "volunteer-ff15c.firebaseapp.com",
            projectId: "volunteer-ff15c",
            storageBucket: "volunteer-ff15c.appspot.com",
            messagingSenderId: "1030400604205",
            appId: "1:1030400604205:web:006ebb3625e507b09460a4",
            measurementId: "G-N5PKYGNYLN"
        };
        
        firebase.initializeApp(config);
    </script>
    <script type="text/javascript">  
        // reCAPTCHA widget    
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            'size': 'invisible',
            'callback': (response) => {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
                onSignInSubmit();
            }
        });

        function otpSend() {
            var phoneNumber = document.getElementById('phone-number').value;
            const appVerifier = window.recaptchaVerifier;
            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then((confirmationResult) => {
                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;

                    //document.getElementById("sent-message").innerHTML = "Message sent succesfully.";

                    //document.getElementById("sent-message").innerHTML = "OTP sent succesfully.";
                    //document.getElementById("verify_otp").classList.add("d-block");
                    //document.getElementById("enter_mobile").classList.add("d-none");

                    //document.getElementById("sent-message").classList.add("d-block");
                    $('#res-msg').html('<p style="color:green;">OTP sent on you mobile no</p>');
                    $('#phone-number').attr('readonly',true);
                    $('#div-otp-code,#btn-verify-otp').show();
                    $('#btn-get-otp').hide();
                }).catch((error) => {
                    //document.getElementById("error-message").innerHTML = error.message;
                    //document.getElementById("error-message").classList.add("d-block");
                    $('#res-msg').html('<p style="color:red;">'+error.message+'</p>');
                });
        }

        function otpVerify() {
            var code = document.getElementById('otp-code').value;
            confirmationResult.confirm(code).then(function (result) {
                // User signed in successfully.
                var user = result.user;


                //document.getElementById("sent-message").innerHTML = "You are succesfully logged in.";
                //document.getElementById("sent-message").classList.add("d-block");

                //console.log(user);
                //ajax request for check mobile no exist or not
                let token = "{{ csrf_token() }}";
                let mobile = $('#phone-number').val();

                $.ajax({
                    url:"{{ url('check-mobile-no') }}",
                    type:"POST",
                    data:{_token:token,mobile:mobile},
                    success:function(response){
                        if(response.status==200 && response.action=='login'){
                            window.location.href = "{{ url('dashboard') }}";
                        }else if(response.status==200 && response.action=='register'){
                            $('#phone-number').attr('readonly',true);
                            $('#div-otp-code,#btn-verify-otp,#btn-get-otp').hide();
                            $('#div-name,#btn-submit').show();
                            $('#name').attr('required',true);
                        }
                    },error:function(error){

                    }
                });
                //$('#').trigger('click');
                //document.getElementById("sign_in").click();
                //document.getElementById("sent-message").innerHTML = "You are succesfully logged in.";
                //document.getElementById("sent-message").classList.add("d-block");
      
            }).catch(function (error) {
                $('#spn-err-otp').text(error.message);
                //document.getElementById("error-message").innerHTML = error.message;
                //document.getElementById("error-message").classList.add("d-block");
            });
        }
    </script>
    <style type="text/css">
    .err-msg{color: red;font-size: 12px;}    
    </style>

</body>

</html>