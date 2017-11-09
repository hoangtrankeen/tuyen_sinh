 <!-- Header -->
 <header id="header" class="header">
  <div class="header-top bg-theme-colored2 sm-text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="widget text-white">
            <ul class="list-inline xs-text-center text-white">
              <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-white"></i> 123-456-789</a> </li>
              <li class="m-0 pl-10 pr-10">
                <a href="#" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i> contact@yourdomain.com</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-7 pr-0">
          <div class="widget">
            <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
              <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
            </ul>
          </div>
        </div>
        {{-- <div class="col-md-3">
          <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
            <li class="m-0 pl-10"> <a href="ajax-load/login-form.html" class="text-white ajaxload-popup"><i class="fa fa-user-o mr-5 text-white"></i> Login /</a> </li>
            <li class="m-0 pl-0 pr-10">
              <a href="ajax-load/register-form.html" class="text-white ajaxload-popup"><i class="fa fa-edit mr-5"></i>Register</a>
            </li>
          </ul>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="header-middle p-0 bg-lightest xs-text-center">
    <div class="container pt-20 pb-20">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
          <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="index-mp-layout1.html"><img src="{{asset('frontend/images/logo-wide.png')}}" alt=""></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                <i class="pe-7s-headphones text-theme-colored2 font-48 mt-0 mr-15 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                <a href="#" class="font-12 text-gray text-uppercase">Call us for more details</a>
                <h5 class="font-13 text-black m-0"> +(012) 345 6789</h5>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                <i class="pe-7s-mail-open text-theme-colored2 font-48 mt-0 mr-15 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                <a href="#" class="font-12 text-gray text-uppercase">Call us for more details</a>
                <h5 class="font-13 text-black m-0"> +(012) 345 6789</h5>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                <i class="pe-7s-map-marker text-theme-colored2 font-48 mt-0 mr-15 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                <a href="#" class="font-12 text-gray text-uppercase">Company Location</a>
                <h5 class="font-13 text-black m-0"> 121 King Street, Melbourne</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
      <div class="container">
        <nav id="menuzord" class="menuzord default menuzord-responsive">
          <ul class="menuzord-menu">
            @foreach($parents as $parent)
            <li class=""><a href="{{route('route.slug',$parent->slug)}}">{{$parent->name}}</a>
              
              @if(count($parent->childs))
              
              @include('frontend/partials/_submenu',['childs' => $parent->childs, 'html'=>'', 'path'=>$parent->slug])
              @endif
              
            </li>
            @endforeach
          </ul>
          <div class="pull-right sm-pull-none mb-sm-15">
            <a class="btn btn-colored btn-theme-colored2 mt-15 mt-sm-10 pt-10 pb-10 ajaxload-popup" href="ajax-load/form-appointment.html">Get a Quote</a>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>