@section('head')

<link href="{{asset('date-picker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">

@stop


@extends('manage/main')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<h4>Create New Student</h4>
			</div>
			<div class="col-xs-2">
				<a href="{{route('students.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
			</div>
		</div>
		
	</div>
	<div class="panel-body">
		
		<div class="row">
			<div class="col-md-10">

				<form method="POST" action="{{route('students.store')}}" class="form-horizontal" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="col-md-12 top-spacing2">
						<hr>
						<h4 class="text-primary">Basic Information</h4>
						<hr>
					</div>
					<div class="row">
						<div class=" col-md-2 col-xs-3">
							<div class="" id="square">
								<div class="content"></div>
							</div>
						</div>

						<div class="col-md-10 col-xs-12 top-spacing2">
							<div class="form-group">

								<label for="name" class=" control-label col-sm-3">Name:</label>
								<div class="col-sm-9">
									<input id="name" name="name" class="form-control">
								</div>

							</div>
							<div class="form-group">
								<label for="birth" class="col-sm-3 control-label">Birth</label>
								<div class="col-sm-9">
									<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="birth" data-link-format="yyyy-mm-dd">
										<input class="form-control" size="16" type="text" value="" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
									<input type="hidden" id="birth" value="" name="birth" />
								</div>
								
							</div>

							<div class="form-group "> 
								<label for="address" class=" control-label col-sm-3">Address:</label>
								<div class="col-sm-9">
									<input  type="text" id="address" name="address" class="form-control"></input>
								</div> 

							</div>
							<div class="form-group "> 
								<label for="province_id" class=" control-label col-sm-3">Native Place:</label> 
								<div class="col-sm-9">
									<select  type="text" id="province_id" name="province_id" class="form-control">
										<option value="">Select...</option>
										@foreach($provinces as $province )
											<option value="{{$province->id}}">{{$province->name}}</option>
										@endforeach
									</select>
								</div>

							</div>
							<div class="form-group "> 
								<label for="email" class=" control-label col-sm-3">Email:</label>
								<div class="col-sm-9">
									<input  type="text" id="email" name="email" class="form-control"></input>
								</div> 

							</div>
							<div class="form-group "> 
								<label for="phone" class=" control-label col-sm-3">Phone:</label> 
								<div class="col-sm-9">
									<input  type="tel" id="phone" name="phone" class="form-control"></input>
								</div>
							</div>
							<div class="form-group top-spacing">
								<label for="image" class=" control-label col-sm-3">Upload Profile Image:</label>
								<div class="col-sm-9">
									<input type="file" id="profile_file" name="image" class="filestyle" data-buttonText="Find file">
								</div>			
							</div>
						</div>
					</div>
					
					

					<div class="col-md-12 top-spacing2">
						<hr>
						<h4 class="text-primary">Details Information</h4>
						<hr>

					</div>
					<div class="form-group"> 
						<label for="identification" class=" control-label col-sm-3">Identification Number:</label> 
						<div class="col-sm-9">
							<input  type="text" id="identification" name="identification" class="form-control"></input>
						</div>

					</div>
					<div class="form-group "> 
						<label for="place_issue" class=" control-label col-sm-3">Place Issue:</label>
						<div class="col-sm-9">
							<input  type="text" id="place_issue" name="place_issue" class="form-control"></input>
						</div>

					</div>
					<div class="form-group">
						<label for="date_issue" class="col-sm-3 control-label">Date Issue</label>
						<div class="col-sm-9">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="birth" data-link-format="yyyy-mm-dd">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							<input type="hidden" id="date_issue" value="" name="date_issue" />
						</div>

					</div>

					

					<div class="form-group top-spacing ident-field" >

						<label for="ident_image" class=" control-label col-sm-3">Upload Identify Image:</label>
						<div class="col-sm-9">
							<input type="file" id="ident_file" name="ident_image" class="filestyle" data-buttonText="Find file">
						</div>

					</div>

					<div class="col-md-12 top-spacing2">
						<hr>
						<h4 class="text-primary">Course Information</h4>
						<hr>
					</div>

					<div class="form-group "> 
						<label for="work_place" class=" control-label col-sm-3">Work Place:</label> 
						<div class="col-sm-9">
							<select name="work_place_id" class="form-control" id="work_place">
								<option value="">Select...</option>
								<option value="0">Noi khac</option>
								<option value="1">Truong Cong nghe GTVT</option>
							</select>
						</div>

					</div>
					<div class="form-group "> 
						<label for="exam_place" class=" control-label col-sm-3">Exam Place:</label> 
						<div class="col-sm-9">
							<select name="exam_place_id" class="form-control" id="exam_place">
								<option value="">Select...</option>
								<option value="0">Tai truong</option>
								<option value="1">Noi khac</option>
							</select>
						</div>

					</div>
					<div class="form-group "> 
						<label for="practice_opt" class=" control-label col-sm-3">Practice Option:</label>
						<div class="col-sm-9"> 
							<select name="practice_opt" class="form-control" id="practice_opt">
								<option value="">Select...</option>
								<option value="0">3 Day</option>
								<option value="1">7 Day</option>
							</select>
						</div> 

					</div>
					<div class="form-group "> 
						<label for="payment_status" class=" control-label col-sm-3">Payment Status:</label>
						<div class="col-sm-9">
							<select name="payment_status" class="form-control" id="payment_status">
								<option value="">Select...</option>
								<option value="0">Not Yet</option>
								<option value="1">Done</option>
							</select>
						</div>

					</div>
					<div class="form-group "> 
						<label for="course_id" class=" control-label col-sm-3">Course:</label>

						<div class="col-sm-9">
							<select name="course_id" class="form-control" id="course_id">
								<option value="" >Select...</option>
								@foreach($courses as $course)
								<option value="{{$course->id}}">{{$course->name}}</option>
								@endforeach  
							</select>
						</div> 

					</div>
					<div class="form-group "> 
						<label for="expense" class=" control-label col-sm-3">Course Fee:</label> 
						<div class="col-sm-9">
							<input  type="number" id="expense" name="expense" class="form-control"></input>
						</div>

					</div><hr> 
					<div class="form-group top-spacing" >
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save</button>
						</div>
						
					</div>  
				</form>
			</div>
			
		</div>




	</div>

</div>

@stop

@section('scripts')


{{--Date Picker  --}}
<script type="text/javascript" src="{{asset('date-picker/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/js/locales/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/index.js')}}"></script>

{{-- File Style --}}
<script type="text/javascript" src="{{asset('filestyle/js/bootstrap-filestyle.min.js')}}"> </script>
<script type="text/javascript">

	$(":file").filestyle();

</script>
@stop