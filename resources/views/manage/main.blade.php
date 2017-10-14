<!DOCTYPE html>
<html>
<head>
 @include('manage/partials/_head') 
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    @include('manage/partials/_header')

    @include('manage/partials/_sidebar')

    <div class="content-wrapper">
      <section class="content-header">
        @yield('content-header')
      </section>
      <section class="content" id="app">
        @include('manage/partials/_message')
        @yield('content')
      </section>
    </div>

    @include('manage/partials/_footer')

    {{-- @include('backend/partials/_control_sidebar') --}}
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar --> 
 </div>
 <!-- ./wrapper -->


 @include('manage/partials/_script')
 
</body>
</html>
