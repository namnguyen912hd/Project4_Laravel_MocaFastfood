<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mocafastfood for everyone</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Honest Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
  <script type="applisalonion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="{{asset('homepage/Assets/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
  <!-- Custom Theme files -->
  <link href="{{asset('homepage/Assets/css/iconeffects.css')}}" rel='stylesheet' type='text/css' />
  <link href="{{asset('homepage/Assets/css/style.css')}}" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="{{asset('homepage/Assets/css/swipebox.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('homepage/Assets/css/font-awesome.min.css')}}"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  @yield('css')
  
  <script src="{{asset('homepage/Assets/js/jquery-1.11.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('homepage/Assets/js/move-top.js')}}"></script>
  <script type="text/javascript" src="{{asset('homepage/Assets/js/easing.js')}}"></script>
  <!--/web-font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <!--/script-->
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 900);
      });
    });
  </script>
  <!-- swipe box js -->
  <script src="{{asset('homepage/Assets/js/jquery.swipebox.min.js')}}"></script>
  <script type="text/javascript">
    jQuery(function ($) {
      $(".swipebox").swipebox();
    });
  </script>
  <!-- //swipe box js -->
  <!--animate-->
  <link href="{{asset('homepage/Assets/css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
  <script src="{{asset('homepage/Assets/js/wow.min.js')}}"></script>
  <script>
    new WOW().init();
  </script>
</head>
<body class="hold-transition sidebar-mini">

  <div class="wrapper">

    @include('partial/home.header')

    @yield('content')

    @include('partial/home.footer')

  </div>
  
  @yield('js')
</body>
</html>
