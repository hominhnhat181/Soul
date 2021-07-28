<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{-- plugin --}}
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"><link
    href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  {{-- player --}}
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/7061c063c6.js" crossorigin="anonymous"></script>

  {{-- icon --}}
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/front/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/front/img/favicon.png')}}">

  {{-- css --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="{{asset('assets/front/css/material-dashboard.css')}}" rel="stylesheet" />

  <title>Home</title>
</head>

<body class="dark-edition">

  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=495127995056192&autoLogAppEvents=1"
    nonce="mgnraTKs"></script>
    
  @include('frontend.inc.header')
  @include('frontend.inc.sidebar')

  @yield('content')

  @include('frontend.inc.footer')

</body>

<!--   Core JS Files   -->
<link href="{{ asset('assets/front/css/material-dashboard.css') }}" rel="stylesheet" />
<script src="{{ asset('assets/front/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/front/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="{{ asset('assets/front/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chartist JS -->
<script src="{{ asset('assets/front/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/front/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/front/js/material-dashboard.js?v=2.1.0') }}"></script>

</html>
