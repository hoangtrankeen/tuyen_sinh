<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  @include('frontend/partials/_head')
</head>
<body class="boxed-layout pt-40 pb-40 pt-sm-0" data-bg-img="{{asset('frontend/images/pattern/p5.png')}}">
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
      <section class="layer-overlay overlay-theme-colored-8" data-bg-img="{{asset('frontend/images/bg/bg7.jpg')}}">
        <div class="container pt-20 pb-5">
          <div class="row">
            <div class="call-to-action">
              <!-- Reservation Form Start-->
              <form id="reservation_form" name="reservation_form" class="reservation-form mb-0" method="post" action="includes/reservation.php">
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="form-group mb-15">
                    <input name="reservation_email" class="form-control required email" type="email" placeholder="Enter Email">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="form-group mb-15">
                    <div class="styled-select">
                      <select id="car_select" name="car_select" class="form-control" required="">
                        <option value="">- Select Courses -</option>
                        <option value="Accounting Technologies">Database Learning</option>
                        <option value="Computer Science">Graphics Design</option>
                        <option value="Graphic Desing">Machanical Engineering</option>
                        <option value="Economic Analysis">Civil Engineering</option>
                        <option value="Modern Languages">Computer Engineering</option>
                        <option value="Chemical Engineering">Web Development</option>
                        <option value="Software Engineering">Spoken English</option>
                        <option value="Electrical & Electronic">Data Analysis</option>
                        <option value="Banking Honours">Stable Management Lesson</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                  <div class="form-group mb-15">
                    <input placeholder="Phone" type="text" id="reservation_phone" name="reservation_phone" class="form-control" required="">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                  <div class="form-group mb-15">
                    <input name="reservation_date" class="form-control required date-picker" type="text" placeholder="Date Of Birth" aria-required="true">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                  <div class="form-group mb-15 mt-0">
                    <input name="form_botcheck" class="form-control" type="hidden" value="">
                    <button type="submit" class="btn btn-theme-colored2 btn-lg form-control" data-loading-text="Please wait...">Submit Now</button>
                  </div>
                </div>
              </form>
              <!-- Reservation Form End-->

              <!-- Reservation Form Validation Start-->
              <script type="text/javascript">
                $("#reservation_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
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
              <!-- Reservation Form Validation Start -->
            </div>
          </div>
        </div>
      </section>

      <!-- Section: About -->
      <section id="about">
        <div class="container pb-40">
          <div class="section-content">
            <div class="row">
              <div class="col-md-8">
                <div class="double-line-bottom-theme-colored-2"></div>
                <h3 class="font-weight-500 font-30 font- mt-10">Tuyển sinh chứng chỉ<span class="text-theme-colored"> Ứng dụng CNTT cơ bản</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore atque officiis maxime suscipit expedita obcaecati nulla in ducimus iure quos quam recusandae dolor quas et perspiciatis voluptatum accusantium delectus nisi reprehenderit,</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore atque officiis maxime suscipit expedita obcaecati nulla in ducimus iure quos quam recusandae dolor quas et perspiciatis voluptatum accusantium delectus nisi reprehenderit,</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore atque officiis maxime suscipit expedita obcaecati nulla in ducimus iure quos quam recusandae dolor quas et perspiciatis voluptatum accusantium delectus nisi reprehenderit,</p>
                <div><a href="#" class="btn btn-theme-colored mb-sm-30">Đăng ký ngay</a></div>
              </div>

            <!-- <div class="col-md-4">
              <div class="box-hover-effect about-video">
                <div class="effect-wrapper">
                  <div class="thumb">
                    <img class="img-responsive img-fullwidth" src="images/photos/1.jpg" alt="">
                  </div>
                  <div class="video-button"></div>
                  <a class="hover-link" data-lightbox-gallery="youtube-video" href="https://www.youtube.com/watch?v=F3QpgXBtDeo" title="Youtube Video">Youtube Video</a>
                </div>
              </div>
            </div> -->

            <div class="col-md-4">
              <h3 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Lịch thi <span class="text-theme-colored2">tuần này</span></h3>
              <article>
               <div class="event-block">
                <div class="event-date text-center">
                  <ul class="text-white font-18 font-weight-600">
                    <li class="border-bottom">28</li>
                    <li class="month">Tháng 10</li>
                  </ul>
                </div>
                <div class="event-meta border-1px pl-40">
                  <div class="event-content pull-left flip">
                    <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="#">Lớp chứng chỉ K032017</a></h4>
                    <span class="mb-10 text-black-555 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored2"></i> Thời gian: 14h30 | 28/10/2017</span>
                    <p><span class="text-black-555"><i class="fa fa-map-marker mr-5 text-theme-colored2"></i> Địa điểm: Phòng 201 Nhà A6 - Trường Đại học Công nghệ GTVT, số 54 Triều Khúc, Thanh Xuân, Hà Nội</span></p>
                  </div>
                </div>
              </div>
            </article>
            <article>
             <div class="event-block">
              <div class="event-date text-center">
                <ul class="text-white font-18 font-weight-600">
                  <li class="border-bottom">28</li>
                  <li class="month">Tháng 10</li>
                </ul>
              </div>
              <div class="event-meta border-1px pl-40">
                <div class="event-content pull-left flip">
                  <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="#">Lớp chứng chỉ K022017</a></h4>
                  <span class="mb-10 text-black-555 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored2"></i> Thời gian: 14h30 | 20/10/2017</span>
                  <p><span class="text-black-555"><i class="fa fa-map-marker mr-5 text-theme-colored2"></i> Địa điểm: Phòng 201 Nhà A6 - Trường Đại học Công nghệ GTVT, số 54 Triều Khúc, Thanh Xuân, Hà Nội</span></p>
                </div>
              </div>
            </div>
          </article>
          <article>
           <div class="event-block">
            <div class="event-date text-center">
              <ul class="text-white font-18 font-weight-600">
                <li class="border-bottom">20</li>
                <li class="month">Tháng 10</li>
              </ul>
            </div>
            <div class="event-meta border-1px pl-40">
              <div class="event-content pull-left flip">
                <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="#">Lớp chứng chỉ K012017</a></h4>
                <span class="mb-10 text-black-555 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored2"></i> Thời gian: 14h30 | 15/10/2017</span>
                <p><span class="text-black-555"><i class="fa fa-map-marker mr-5 text-theme-colored2"></i> Địa điểm: Phòng 201 Nhà A6 - Trường Đại học Công nghệ GTVT, số 54 Triều Khúc, Thanh Xuân, Hà Nội</span></p>
              </div>
            </div>
          </div>
        </article>
      </div>

    </div>
  </div>
</div>
</section>

<!-- Section: Courses -->
<section id="courses" class="bg-silver-deep">
  <div class="container pt-30 pb-40">
    <div class="section-title">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-uppercase title">Popular <span class="text-theme-colored2">Courses</span></h2>
          <p class="text-uppercase mb-0">Choose Your Desired Course</p>
          <div class="double-line-bottom-theme-colored-2"></div>
        </div>
      </div>
    </div>
    <div class="row mtli-row-clearfix">
      <div class="owl-carousel-3col" data-nav="true">
        <div class="item">
          <div class="course-single-item bg-white border-1px clearfix mb-30">
            <div class="course-thumb">
              <img class="img-fullwidth" alt="" src="{{asset('frontend/images/course/sm1.jpg')}}">
              <div class="price-tag">$290</div>
            </div>
            <div class="course-details clearfix p-20 pt-15">
              <div class="course-top-part pull-left mr-40">
                <a href="page-course-details.html"><h4 class="mt-0 mb-5">Nural Networking Course</h4></a>
                <ul class="list-inline">
                  <li class="review-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </li>
                  <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                  <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                </ul>
              </div>
              <div class="author-thumb">
                <img src="{{asset('frontend/images/course/xs1.jpg')}}" alt="" class="img-circle">
              </div>
              <div class="clearfix"></div>
              <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
              <ul class="list-inline course-meta mt-15">
                <li>
                  <h6>4 year</h6>
                  <span> Course</span>
                </li>
                <li>
                  <h6>35</h6>
                  <span> Class Size</span>
                </li>
                <li>
                  <h6><span class="course-time">2 hours 30 min</span></h6>
                  <span> Class Duration</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="course-single-item bg-white border-1px clearfix mb-30">
            <div class="course-thumb">
              <img class="img-fullwidth" alt="" src="{{asset('frontend/images/course/sm2.jpg')}}">
              <div class="price-tag">$290</div>
            </div>
            <div class="course-details clearfix p-20 pt-15">
              <div class="course-top-part pull-left mr-40">
                <a href="page-course-details.html"><h4 class="mt-0 mb-5">Nural Networking Course</h4></a>
                <ul class="list-inline">
                  <li class="review-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  </li>
                  <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                  <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                </ul>
              </div>
              <div class="author-thumb">
                <img src="{{asset("frontend/images/course/xs2.jpg")}}" alt="" class="img-circle">
              </div>
              <div class="clearfix"></div>
              <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
              <ul class="list-inline course-meta mt-15">
                <li>
                  <h6>3 year</h6>
                  <span> Course</span>
                </li>
                <li>
                  <h6>20</h6>
                  <span> Class Size</span>
                </li>
                <li>
                  <h6><span class="course-time">1 hour 45 min</span></h6>
                  <span> Class Duration</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="course-single-item bg-white border-1px clearfix mb-30">
            <div class="course-thumb">
              <img class="img-fullwidth" alt="" src="{{asset('frontend/images/course/sm3.jpg')}}">
              <div class="price-tag">Free</div>
            </div>
            <div class="course-details clearfix p-20 pt-15">
              <div class="course-top-part pull-left mr-40">
                <a href="page-course-details.html"><h4 class="mt-0 mb-5">Nural Networking Course</h4></a>
                <ul class="list-inline">
                  <li class="review-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </li>
                  <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                  <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                </ul>
              </div>
              <div class="author-thumb">
                <img src="{{asset('frontend/images/course/xs3.jpg')}}" alt="" class="img-circle">
              </div>
              <div class="clearfix"></div>
              <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
              <ul class="list-inline course-meta mt-15">
                <li>
                  <h6>2 year</h6>
                  <span> Course</span>
                </li>
                <li>
                  <h6>30</h6>
                  <span> Class Size</span>
                </li>
                <li>
                  <h6><span class="course-time">2 hours 30 min</span></h6>
                  <span> Class Duration</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="course-single-item bg-white border-1px clearfix mb-30">
            <div class="course-thumb">
              <img class="img-fullwidth" alt="" src="{{asset('frontend/images/course/sm4.jpg')}}">
              <div class="price-tag">$290</div>
            </div>
            <div class="course-details clearfix p-20 pt-15">
              <div class="course-top-part pull-left mr-40">
                <a href="page-course-details.html"><h4 class="mt-0 mb-5">Nural Networking Course</h4></a>
                <ul class="list-inline">
                  <li class="review-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                  </li>
                  <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                  <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                </ul>
              </div>
              <div class="author-thumb">
                <img src="{{asset('frontend/images/course/xs1.jpg')}}" alt="" class="img-circle">
              </div>
              <div class="clearfix"></div>
              <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
              <ul class="list-inline course-meta mt-15">
                <li>
                  <h6>1 year</h6>
                  <span> Course</span>
                </li>
                <li>
                  <h6>45</h6>
                  <span> Class Size</span>
                </li>
                <li>
                  <h6><span class="course-time">3 hours 20 min</span></h6>
                  <span> Class Duration</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Divider: Why Choose Us -->
<section>
  <div class="container pt-0 pb-0">
    <div class="row">
      <div class="col-md-5">
        <img class="img-fullwidth" src="{{asset('frontend/images/photos/1.png')}}" alt="">
      </div>
      <div class="col-md-7 pt-20">
        <div class="row mtli-row-clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Why <span class="text-theme-colored2">Choose</span> Us?</h2>
            <div class="double-line-bottom-theme-colored-2 mb-30"></div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="icon-box left media p-0 mb-40">
              <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-note2 text-theme-colored2 font-weight-600"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading mb-10">Popular Courses</h4>
                <p>Lorem ipsum dolor sit ametcon sectet uradipis icing elitCum consec tetur sectet uradipis icing consec tetur</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="icon-box left media p-0 mb-40">
              <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-notebook text-theme-colored2 font-weight-600"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading mb-10">Modern Book Library</h4>
                <p>Lorem ipsum dolor sit ametcon sectet uradipis icing elitCum consec tetur sectet uradipis icing consec tetur</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="icon-box left media p-0 mb-40">
              <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-diamond text-theme-colored2 font-weight-600"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading mb-10">Qualified Teachers</h4>
                <p>Lorem ipsum dolor sit ametcon sectet uradipis icing elitCum consec tetur sectet uradipis icing consec tetur</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="icon-box left media p-0 mb-40">
              <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-bell text-theme-colored2 font-weight-600"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading mb-10">Update Notification</h4>
                <p>Lorem ipsum dolor sit ametcon sectet uradipis icing elitCum consec tetur sectet uradipis icing consec tetur</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="icon-box left media p-0 mb-40">
              <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-musiclist text-theme-colored2 font-weight-600"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading mb-10">Entertainment Facilities</h4>
                <p>Lorem ipsum dolor sit ametcon sectet uradipis icing elitCum consec tetur sectet uradipis icing consec tetur</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="icon-box left media p-0 mb-40">
              <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-global text-theme-colored2 font-weight-600"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading mb-10">24/7 Online Support</h4>
                <p>Lorem ipsum dolor sit ametcon sectet uradipis icing elitCum consec tetur sectet uradipis icing consec tetur</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Team -->
<section id="team" class="bg-silver-deep">
  <div class="container pt-30 pb-40">
    <div class="section-title">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-uppercase title">Qualified <span class="text-theme-colored2">Teachers</span></h2>
          <p class="text-uppercase mb-0">We Have Highly Qualified Teachers</p>
          <div class="double-line-bottom-theme-colored-2"></div>
        </div>
      </div>
    </div>
    <div class="row mtli-row-clearfix">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
          <div class="team-thumb">
            <img class="img-fullwidth" alt="" src="{{asset('frontend/images/team/1.jpg')}}">
            <div class="team-overlay"></div>
            <ul class="styled-icons team-social icon-sm">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
          </div>
          <div class="team-details">
            <h4 class="text-uppercase text-theme-colored font-weight-600 m-5">Jhon Anderson</h4>
            <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">Civil Engineer</h6>
            <p class="hidden-md">Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium</p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
          <div class="team-thumb">
            <img class="img-fullwidth" alt="" src="{{asset('frontend/images/team/2.jpg')}}">
            <div class="team-overlay"></div>
            <ul class="styled-icons team-social icon-sm">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
          </div>
          <div class="team-details">
            <h4 class="text-uppercase text-theme-colored font-weight-600 m-5">Jhon Anderson</h4>
            <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">Civil Engineer</h6>
            <p class="hidden-md">Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium</p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
          <div class="team-thumb">
            <img class="img-fullwidth" alt="" src="{{asset('frontend/images/team/3.jpg')}}">
            <div class="team-overlay"></div>
            <ul class="styled-icons team-social icon-sm">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
          </div>
          <div class="team-details">
            <h4 class="text-uppercase text-theme-colored font-weight-600 m-5">Jhon Anderson</h4>
            <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">Civil Engineer</h6>
            <p class="hidden-md">Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Gallery -->
<section id="gallery">
  <div class="container pt-30">
    <div class="section-title">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-uppercase title">Campus <span class="text-theme-colored2">Gallery</span></h2>
          <p class="text-uppercase mb-0">See our gallery pictures</p>
          <div class="double-line-bottom-theme-colored-2"></div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <!-- Works Filter -->
          <div class="portfolio-filter font-alt align-center">
            <a href="#" class="active" data-filter="*">All</a>
            <a href="#select1" class="" data-filter=".select1">Photos</a>
            <a href="#select2" class="" data-filter=".select2">Campus</a>
            <a href="#select3" class="" data-filter=".select3">Students</a>
          </div>
          <!-- End Works Filter -->

          <!-- Portfolio Gallery Grid -->
          <div id="grid" class="gallery-isotope default-animation-effect grid-4 gutter clearfix">

            <!-- Portfolio Item Start -->
            <div class="gallery-item select1">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s1.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/1.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/1.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select1">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s2.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/2.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/2.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select2">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s3.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/3.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/3.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select3">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset("frontend/images/gallery/s4.jpg")}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset("frontend/images/gallery/4.jpg")}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset("frontend/images/gallery/4.jpg")}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select1" style="position: absolute; left: 0px; top: 165px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset("frontend/images/gallery/s5.jpg")}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/5.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/5.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select3" style="position: absolute; left: 285px; top: 165px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s6.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/6.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/6.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select2" style="position: absolute; left: 570px; top: 165px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s7.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/7.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/7.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select3" style="position: absolute; left: 855px; top: 165px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s8.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/8.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/8.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select1" style="position: absolute; left: 0px; top: 330px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s9.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/9.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/9.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select2" style="position: absolute; left: 285px; top: 330px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s10.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/10.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset('frontend/images/gallery/10.jpg')}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select1" style="position: absolute; left: 570px; top: 330px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset('frontend/images/gallery/s11.jpg')}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset('frontend/images/gallery/11.jpg')}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="images/gallery/11.jpg">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

            <!-- Portfolio Item Start -->
            <div class="gallery-item select3" style="position: absolute; left: 855px; top: 330px;">
              <div class="thumb">
                <img class="img-fullwidth" src="{{asset("frontend/images/gallery/s12.jpg")}}" alt="project">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                      <a data-lightbox="image" href="{{asset("frontend/images/gallery/12.jpg")}}"><i class="fa fa-plus"></i></a>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </div>
                  </div>
                </div>
                <a class="hover-link" data-lightbox="image" href="{{asset("frontend/images/gallery/12.jpg")}}">View more</a>
              </div>
            </div>
            <!-- Portfolio Item End -->

          </div>
          <!-- End Portfolio Gallery Grid -->
        </div>
      </div>
    </div>
  </div>
</section>

<!--start Funfacts Section-->
<section class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="{{asset("frontend/images/bg/bg1.jpg")}}" data-parallax-ratio="0.4">
  <div class="container pt-70 pb-90">
    <div class="section-content">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
          <div class="funfact text-center">
            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="5100" data-theme="minimal">0</div>
            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
            <h5 class="text-white text-uppercase mb-0">Happy Students</h5>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
          <div class="funfact text-center">
            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="200" data-theme="minimal">0</div>
            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
            <h5 class="text-white text-uppercase mb-0">Approved Courses</h5>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
          <div class="funfact text-center">
            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="20" data-theme="minimal">0</div>
            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
            <h5 class="text-white text-uppercase mb-0">Certified Teachers</h5>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
          <div class="funfact text-center">
            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="600" data-theme="minimal">0</div>
            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
            <h5 class="text-white text-uppercase mb-0">Graduate Students</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Pricing -->
<section id="pricing">
  <div class="container pt-70">
    <div class="section-title">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="text-uppercase title">Course <span class="text-theme-colored2">Pricing</span></h2>
          <div class="double-line-bottom-centered-theme-colored-2 mt-20"></div>
          <p class="text-uppercase">Choose Your Desired Pricing Plan</p>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30">
          <div class="pricing-table bg-silver-deep text-center maxwidth400 pt-10">
            <h2 class="package-type text-uppercase line-bottom-centered mb-50">Premium</h2>
            <h2 class="price text-theme-colored2 font-opensans font-weight-400 font-64 bg-white pt-10 pb-20 mb-0"><span class="font-36 currency">$</span>220 <span class="font-16 text-black">/ Month</span></h2>
            <ul class="list price-list theme-colored text-left flip check-circle mt-0 mb-20">
              <li>Garden Care &amp; Lawn Moving</li>
              <li>Forest Planting</li>
              <li>Free Rubbish Removal</li>
              <li>24 Hours Service</li>
            </ul>
            <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="#">Signup Now</a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30">
          <div class="pricing-table bg-silver-deep text-center maxwidth400 pt-10">
            <h2 class="package-type text-uppercase line-bottom-centered mb-50">Gold</h2>
            <h2 class="price text-theme-colored2 font-opensans font-weight-400 font-64 bg-white pt-10 pb-20 mb-0"><span class="font-36 currency">$</span>280 <span class="font-16 text-black">/ Month</span></h2>
            <ul class="list price-list theme-colored text-left flip check-circle mt-0 mb-20">
              <li>Garden Care &amp; Lawn Moving</li>
              <li>Forest Planting</li>
              <li>Free Rubbish Removal</li>
              <li>24 Hours Service</li>
            </ul>
            <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="#">Signup Now</a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30">
          <div class="pricing-table bg-silver-deep text-center maxwidth400 pt-10">
            <h2 class="package-type text-uppercase line-bottom-centered mb-50">Silver</h2>
            <h2 class="price text-theme-colored2 font-opensans font-weight-400 font-64 bg-white pt-10 pb-20 mb-0"><span class="font-36 currency">$</span>340 <span class="font-16 text-black">/ Month</span></h2>
            <ul class="list price-list theme-colored text-left flip check-circle mt-0 mb-20">
              <li>Garden Care &amp; Lawn Moving</li>
              <li>Forest Planting</li>
              <li>Free Rubbish Removal</li>
              <li>24 Hours Service</li>
            </ul>
            <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="#">Signup Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Divider: Testimonials -->
<section class="bg-silver-deep">
  <div class="container pt-20 pb-30">
    <div class="section-title">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-uppercase title">What <span class="text-theme-colored2">People </span>Say</h2>
          <p class="text-uppercase mb-0">Student and Parents Opinion</p>
          <div class="double-line-bottom-theme-colored-2"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-30">
        <div class="owl-carousel-2col boxed" data-dots="true">
          <div class="item">
            <div class="testimonial pt-10">
              <div class="thumb pull-left mb-0 mr-0">
                <img class="img-thumbnail img-circle" alt="" src="{{asset('frontend/images/testimonials/1.jpg')}}" width="110">
              </div>
              <div class="testimonial-content">
                <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                <h6 class="mt-5">CEO apple.inc</h6>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial pt-10">
              <div class="thumb pull-left mb-0 mr-0">
                <img class="img-thumbnail img-circle" alt="" src="{{asset('frontend/images/testimonials/2.jpg')}}" width="110">
              </div>
              <div class="testimonial-content">
                <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                <h6 class="mt-5">CEO apple.inc</h6>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial pt-10">
              <div class="thumb pull-left mb-0 mr-0">
                <img class="img-thumbnail img-circle" alt="" src="{{asset('frontend/images/testimonials/3.jpg')}}" width="110">
              </div>
              <div class="testimonial-content">
                <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                <h6 class="mt-5">CEO apple.inc</h6>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial pt-10">
              <div class="thumb pull-left mb-0 mr-0">
                <img class="img-thumbnail img-circle" alt="" src="{{asset('frontend/images/testimonials/1.jpg')}}" width="110">
              </div>
              <div class="testimonial-content">
                <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                <h6 class="mt-5">CEO apple.inc</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: blog -->
<section id="blog">
  <div class="container pt-30 pb-40">
    <div class="section-title">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-uppercase title">Latest <span class="text-theme-colored2">News </span></h2>
          <p class="text-uppercase mb-0">See All Time Latest News</p>
          <div class="double-line-bottom-theme-colored-2"></div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel-3col owl-nav-top" data-nav="true">
            <div class="item">
              <article class="post clearfix mb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{asset('frontend/images/blog/1.jpg')}}" alt="" class="img-responsive img-fullwidth">
                  </div>
                  <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600">28</li>
                      <li class="font-12 text-white text-uppercase">Feb</li>
                    </ul>
                  </div>
                </div>
                <div class="entry-content p-15">
                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
                    <div class="media-body pl-0">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="blog-single-left-sidebar.html">Post title here</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-user-o mr-5 text-theme-colored2"></i>By Author</span><span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i>Likes</span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-share-alt mr-5 text-theme-colored2"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti</p>
                  <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
            <div class="item">
              <article class="post clearfix mb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{asset('frontend/images/blog/2.jpg')}}" alt="" class="img-responsive img-fullwidth">
                  </div>
                  <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600">28</li>
                      <li class="font-12 text-white text-uppercase">Feb</li>
                    </ul>
                  </div>
                </div>
                <div class="entry-content p-15">
                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
                    <div class="media-body pl-0">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="blog-single-left-sidebar.html">Post title here</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-user-o mr-5 text-theme-colored2"></i>By Author</span><span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i>Likes</span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-share-alt mr-5 text-theme-colored2"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti</p>
                  <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
            <div class="item">
              <article class="post clearfix mb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{asset('frontend/images/blog/3.jpg')}}" alt="" class="img-responsive img-fullwidth">
                  </div>
                  <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600">28</li>
                      <li class="font-12 text-white text-uppercase">Feb</li>
                    </ul>
                  </div>
                </div>
                <div class="entry-content p-15">
                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
                    <div class="media-body pl-0">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="blog-single-left-sidebar.html">Post title here</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-user-o mr-5 text-theme-colored2"></i>By Author</span><span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i>Likes</span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-share-alt mr-5 text-theme-colored2"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti</p>
                  <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
            <div class="item">
              <article class="post clearfix mb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{asset('frontend/images/blog/4.jpg')}}" alt="" class="img-responsive img-fullwidth">
                  </div>
                  <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600">28</li>
                      <li class="font-12 text-white text-uppercase">Feb</li>
                    </ul>
                  </div>
                </div>
                <div class="entry-content p-15">
                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
                    <div class="media-body pl-0">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="blog-single-left-sidebar.html">Post title here</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-user-o mr-5 text-theme-colored2"></i>By Author</span><span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i>Likes</span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-share-alt mr-5 text-theme-colored2"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti</p>
                  <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Divider: Clients -->
<section class="clients bg-theme-colored2">
  <div class="container pt-10 pb-10">
    <div class="row">
      <div class="col-md-12">
        <!-- Section: Clients -->
        <div class="owl-carousel-6col clients-logo transparent text-center">
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w1.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w2.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w3.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w4.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w5.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w6.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w3.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w4.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w5.png')}}" alt=""></a></div>
          <div class="item"> <a href="#"><img src="{{asset('frontend/images/clients/w6.png')}}" alt=""></a></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end main-content -->
</div>
@include("frontend/partials/_footer")
</div>
<!-- end wrapper -->

@include('frontend/partials/_scripts')
</body>
</html>
