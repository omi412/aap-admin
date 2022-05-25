<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AAP</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('assets/images/aap_logo.png')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{ asset ('assets/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


</head>

<body>
     <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('partials/headers')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('partials/sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <!-- @section('content') -->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
                @yield('content')
            </div>
        </div>
        @include('partials/footer')

    </div>


    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
     <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset ('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{ asset ('assets/js/quixnav-init.js')}}"></script>
    <script src="{{ asset ('assets/js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{ asset ('assets/vendor/raphael/raphael.min.js')}}"></script>
    <!-- <script src="{{ asset ('assets/vendor/morris/morris.min.js')}}"></script> -->


    <script src="{{ asset ('assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset ('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{ asset ('assets/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset ('assets/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset ('assets/vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset ('assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{ asset ('assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset ('assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{ asset ('assets/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

   <!--  <script src="{{ asset ('assets/js/dashboard/dashboard-1.js')}}"></script> -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    function notification(type,text,timer=3000){
      swal({
        title: "",
        text:text,
        icon: type,
        timer:timer,
        showConfirmButton:false
      });
    }    
    </script>
    @yield('script')


</body>

</html>
