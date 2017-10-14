
<script src="https://unpkg.com/vue@2.4.4/dist/vue.js"></script>
<!-- jQuery 3 -->
<script src="{{asset('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('asset/dist/js/demo.js')}}"></script>


{{-- Bootstrap date picker plugin --}}


{{-- myscripts --}}

<script src="{{asset('js/myscript.js')}}"></script>

{{-- SElect 2 --}}
<script src="{{asset('select2/js/select2.full.js')}}"></script>

 @yield('scripts')

<script>
  
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })


</script>



