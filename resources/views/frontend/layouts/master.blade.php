<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- plugin --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> 

    {{-- icon --}}
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/front/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/front/img/favicon.png')}}">

    {{-- css --}}
    <link href="{{asset('assets/front/css/material-dashboard.css')}}" rel="stylesheet" />

    <title>Home</title>
</head>
<body class="dark-edition">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=495127995056192&autoLogAppEvents=1" nonce="mgnraTKs"></script>
    @include('frontend.inc.header')
    @include('frontend.inc.sidebar')

    @yield('content')

    @include('frontend.inc.footer')
  </body>
</html>