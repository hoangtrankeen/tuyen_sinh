@extends('frontend/main')

@section('content')

<section id="reservation" class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="images/bg/bg1.jpg" data-parallax-ratio="0.4" style="background-image: url(&quot;images/bg/bg1.jpg&quot;); background-position: 50% 112px;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 sm-text-center">
				<h3 class="text-white mt-30 mb-0">Get a Free online Registration</h3>
				<h2 class="text-theme-colored2 font-54 mt-0">Register Now!</h2>
				<p class="text-gray-darkgray font-15 pr-90 pr-sm-0 mb-sm-60">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam suscipit fugiat sint totam soluta assumenda quasi reprehenderit, quas. Natus voluptatibus perferendis repellendus provident? Amet rerum quis odio voluptas dolorem placeat soluta sit officiis odit velit! Nihil qui placeat quibusdam, voluptates voluptatum et.</p>
				<div class="row mt-30 sm-text-center">
					<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
						<div class="funfact">
							<i class="pe-7s-smile mb-20 text-theme-colored2"></i>
							<h2 data-animation-duration="2000" data-value="754" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15 appeared">754</h2>
							<h5 class="text-white text-uppercase">Happy Students</h5>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
						<div class="funfact">
							<i class="pe-7s-notebook mb-20 text-theme-colored2"></i>
							<h2 data-animation-duration="2000" data-value="675" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15 appeared">675</h2>
							<h5 class="text-white text-uppercase">Approved Courses</h5>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
						<div class="funfact">
							<i class="pe-7s-users mb-20 text-theme-colored2"></i>
							<h2 data-animation-duration="2000" data-value="675" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15 appeared">675</h2>
							<h5 class="text-white text-uppercase">Certified Teachers</h5>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
						<div class="funfact">
							<i class="pe-7s-study mb-20 text-theme-colored2"></i>
							<h2 data-animation-duration="2000" data-value="1248" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15 appeared">1,248</h2>
							<h5 class="text-white text-uppercase">Graduate Students</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
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
								<div class="form-group">
									<textarea placeholder="Enter Message" rows="3" class="form-control required" name="form_message" id="form_message" aria-required="true"></textarea>
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

@stop