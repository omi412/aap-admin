<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('assets/images/aap_logo.png')}}">
    <link href="{{ asset ('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/css/custom.css')}}" rel="stylesheet">

</head>

<body class="h-100">
<div class="authincation h-100 login" style="display: none;">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5 mx-auto">
                  <div class="card-group">
                    <div class="card p-4">
                      <div class="card-body">
                          <div class="logo">
                            <img src="{{ asset ('assets/images/aap_logo.png')}}" class="img" alt="admin"/>
                          </div>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Phone No') }}</label>

                                <div class="col-md-6">
                                    <input id="mobileno" type="text" class="form-control" name="mobileno" autocomplete="mobileno">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
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

    <div class="authincation h-100" style="display: none;">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile No') }}</label>

                                        <div class="col-md-6">
                                            <input id="mobileno" type="text" class="form-control" name="mobileno" required autocomplete="mobileno">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
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
                              <div id="recaptcha-container"></div>
                              <div class="row">
                                <div class="col-5 text-left mobile" style="padding: 0px;">
                                  
                                </div>
                                <div class="col-7 text-right">
                                  <button type="submit" onclick="phoneSendAuth();"  class="btn btn-primary mt-3">Register</button>
                                  <button type="submit" class="btn btn-primary px-4 mt-3" onclick="phoneSendAuth();">Login</button>
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

    <script type="module">

  const firebaseConfig = {

    apiKey: "AIzaSyAvBMAE6qDCryAC_xbrSxMhc9bsdIF_tRQ",
    authDomain: "volunteer-mp-tour.firebaseapp.com",
    projectId: "volunteer-mp-tour",
    storageBucket: "volunteer-mp-tour.appspot.com",
    messagingSenderId: "776607129027",
    appId: "1:776607129027:web:df501d558a1edf8c777176",
    measurementId: "G-J6SBLVXHFT"

  };


  // Initialize Firebase

    firebase.initializeApp(firebaseConfig);

</script>
  

<script type="text/javascript">

  

    window.onload=function () {

      render();

    };

  

    function render() {

        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');

        recaptchaVerifier.render();

    }

  

    function phoneSendAuth() {

           

        var number = $("#number").val();

        //alert(number);

        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {

            alert('working')

              

            window.confirmationResult=confirmationResult;

            coderesult=confirmationResult;

            console.log(coderesult);

  

            $("#sentSuccess").text("Message Sent Successfully.");

            $("#sentSuccess").show();

              

        }).catch(function (error) {

            $("#error").text(error.message);

            console.log(error.message);

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
