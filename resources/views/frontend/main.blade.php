<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  @include('frontend/partials/_head')
</head>
{{-- <body class="boxed-layout pt-40 pb-40 pt-sm-0" data-bg-img="{{asset('frontend/images/pattern/p5.png')}}"> --}} 

  <body class="pt-sm-0">
  <div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
      <div id="spinner">
        <img alt="" src="{{asset('frontend/images/preloaders/5.gif')}}">
      </div>
      <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    @include('frontend/partials/_header')

    <!-- Start main-content -->
    <div class="main-content">
      @include('frontend/partials/_slider') 

      <!-- Divider: Call To Action -->

      @yield('content')
      <!-- Divider: Clients -->
      
      <!-- end main-content -->
    </div>
    @include("frontend/partials/_footer")
  </div>
  <!-- end wrapper -->

  @include('frontend/partials/_scripts')
</body>
</html>
