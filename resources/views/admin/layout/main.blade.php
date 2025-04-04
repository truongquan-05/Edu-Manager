<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('argon-dashboard-master/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('argon-dashboard-master/assets/img/favicon.png')}}">
  <title>
    Edu Manager
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('argon-dashboard-master/assets/css/argon-dashboard.css')}}" rel="stylesheet" />
</head>


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>

  @include('admin.layout.sidebar')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('admin.layout.nav')
    <!-- End Navbar -->
    @yield('content')
  </main>

  <!--   Core JS Files   -->
  <script src="{{asset('argon-dashboard-master/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('argon-dashboard-master/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('argon-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('argon-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('argon-dashboard-master/assets/js/plugins/chartjs.min.js')}}"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('argon-dashboard-master/assets/js/argon-dashboard.min.js?v=2.1.0')}}"></script>
</body>

</html>