@extends('frontend.main')

@section('content')

<section id="about">
  <div class="container pb-40">
    <div class="section-content">
      <div class="row">
        <div class="col-md-8">
          <div class="double-line-bottom-theme-colored-2"></div>
          <h3 class="font-weight-500 font-30 font- mt-10">{{$section1->title}}</h3>
          <p>{{$post_1->body}}</p><hr>
          <ul>
           @foreach($posts_1 as $p1)
           <li><a href="" class="btn btn-link">{{$p1->title}}</a></li><hr>
           @endforeach
         </ul>
         
         {{-- <div><a href="#" class="btn btn-theme-colored mb-sm-30">Đăng ký ngay</a></div> --}}
       </div>

       <div class="col-md-4">
        <h3 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Lịch thi <span class="text-theme-colored2">tuần này</span></h3>
        {{-- {{dd($posts_2)}} --}}
        @foreach($posts_2 as $p2)
        <article>
         {!!$p2->body!!}
        </article>
        @endforeach
     </div>

   </div>
 </div>
</div>
</section>
<section id="reservation" class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="{{asset('frontend/images/bg/bg1.jpg')}}" data-parallax-ratio="0.4" style="background-image: url(&quot;{{asset('frontend/images/bg/bg1.jpg')}}&quot;); background-position: 50% 112px;">
  <div class="container">
    <div class="row">
      <div class="col-md-5 sm-text-center">
        <h3 class="text-white mt-30 mb-0">Get a Free online Registration</h3>
        <h2 class="text-theme-colored2 font-54 mt-0">Register Now!</h2>
        <p class="text-gray-darkgray font-15 pr-90 pr-sm-0 mb-sm-60"></p>
        
      </div>
      <div class="col-md-7">
       <div class="p-30 mt-0 bg-dark-transparent-2">
        <h3 class="title-pattern mt-0"><span class="text-white">Request <span class="text-theme-colored2">Information</span></span></h3>
        <!-- Appilication Form Start-->
        <form id="reservation_form" name="reservation_form" class="reservation-form mt-20" method="post" action="includes/reservation.php" novalidate="novalidate">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group mb-20">
                <input placeholder="Enter Name" id="reservation_name" name="reservation_name" required="" class="form-control" aria-required="true" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-20">
                <input placeholder="Email" id="reservation_email" name="reservation_email" class="form-control" required="" aria-required="true" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-20">
                <input placeholder="Phone" id="reservation_phone" name="reservation_phone" class="form-control" required="" aria-required="true" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-20">
                <div class="styled-select">
                  <select id="person_select" name="person_select" class="form-control" required="" aria-required="true">
                    <option value="">Choose Subject</option>
                    <option value="1 Person">Software Engineering</option>
                    <option value="2 Person">Computer Science engineering</option>
                    <option value="3 Person">Accounting Technologies</option>
                    <option value="Family Pack">BACHELOR`S DEGREE</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-20">
                <input name="Date Of Birth" class="form-control required date-picker" placeholder="Date Of Birth" aria-required="true" type="text">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-0 mt-10">
                <input name="form_botcheck" class="form-control" value="" type="hidden">
                <button type="submit" class="btn btn-colored btn-theme-colored2 text-white btn-lg btn-block" data-loading-text="Please wait...">Submit Request</button>
              </div>
            </div>
          </div>
        </form>
        <!-- Application Form End-->

        <!-- Application Form Validation Start-->
        <script type="text/javascript">
          $("#reservation_form").validate({
            submitHandler: function(form) {
              var form_btn = $(form).find('button[type="submit"]');
              var form_result_div = '#form-result';
              $(form_result_div).remove();
              form_btn.before('&amp;lt;div id="form-result" class="alert alert-success" role="alert" style="display: none;"&amp;gt;&amp;lt;/div&amp;gt;');
              var form_btn_old_msg = form_btn.html();
              form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
              $(form).ajaxSubmit({
                dataType:  'json',
                success: function(data) {
                  if( data.status == 'true' ) {
                    $(form).find('.form-control').val('');
                  }
                  form_btn.prop('disabled', false).html(form_btn_old_msg);
                  $(form_result_div).html(data.message).fadeIn('slow');
                  setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                }
              });
            }
          });
        </script>
        <!-- Application Form Validation Start -->
      </div>
    </div>
  </div>
</div>
</section>



@endsection


