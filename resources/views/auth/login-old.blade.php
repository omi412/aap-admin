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
                      <div class="card-body">
                          <div class="logo">
                            <img src="{{ asset ('assets/images/aap_logo.png')}}" class="img" alt="admin"/>
                          </div>
                          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                              <div class="input-group mb-3">
                                <label for="mobileno" class="phone_label">Phone No.</label>
                                <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Enter Phone No." value="{{ old('mobileno') }}" required autofocus>
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
                                  <button type="submit" class="btn btn-primary px-4 mt-3">Login</button></a>
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


    <div class="authincation h-100" style="display:none;">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group row{{ $errors->has('mobileno') ? ' has-error' : '' }}">
                                        <label for="mobileno" class="col-md-4 control-label">Enter Mobile No.</label>
                                        <div class="col-md-8">
                                            <input id="mobileno" type="text" class="form-control" name="mobileno" value="{{ old('mobileno') }}" required autofocus>
                                            @if ($errors->has('mobileno'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobileno') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>

                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
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

</body>

</html>