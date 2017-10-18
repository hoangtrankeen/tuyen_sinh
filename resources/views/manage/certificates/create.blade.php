
@extends('manage/main')

@section('title','| Create Certificate')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('parsley/parsley.css')}}">
<link href="{{asset('date-picker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
@stop

@section('content-header')
<h1 class="page-title">Create New Certificate</h1>
@stop

@section('content')

<form method="POST" action="{{route('certificates.store')}}" accept-charset="UTF-8"
enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Certificate Information</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="course_id">Course</label>
					<select class="form-control" name="course_id" id="course_id">
						<option value="">Select...</option>
						@foreach($courses as $course)
						<option value="{{$course->id}}">{{$course->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="student_id">Student</label>
					<select class="form-control" name="student_id" id="student_id">
						<option value="" id="first-one">Select...</option>
						@foreach($students as $student)
						<option value="{{$student->id}}" >{{$student->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="multi_choice">Multi-Choise Point</label>
					<input type="number" id="multi_choice" name="multi_choice"  class="form-control" data-parsley-type="number" data-parsley-required="true"></input>
				</div>
				<div class="form-group">
					<label for="practice">Practice Point</label>
					<input type="number" id="practice" name="practice"  class="form-control" data-parsley-type="number" data-parsley-required="true"></input>
				</div>
				<div class="form-group">
					<label for="cer_code">Certificate Code</label>
					<input type="text" id="cer_code" name="cer_code"  class="form-control" data-parsley-type="number" data-parsley-required="true"></input>
				</div>
				<div class="form-group">
					<label for="issue_code">Issue Point</label>
					<input type="text" id="issue_code" name="issue_code"  class="form-control" data-parsley-type="number" data-parsley-required="true"></input>
				</div>
				<div class="form-group">
					<label for="date_issue" class=" control-label">Date Issue</label>
					<div class="input-group date form_date" data-date="" data-date-format="jj/mm/YY" data-link-field="date_issue" data-link-format="yyyy-mm-dd">
						<input class="form-control" size="16" type="text" value="" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					<input type="hidden" id="date_issue" value="" name="date_issue" />
				</div >
			</div>
			
		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body">
				<div class="text">
					<button class="btn btn-success ">
						<i class="fa fa-check"></i> Save
					</button>
					<a href="{{route('certificates.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
				</div>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Status</h3>
			</div>
			<div class="box-body">
				<select class="form-control" name="status"> 
					<option value="0">Disabled</option>
					<option value="1">Activated</option>
				</select>
				
			</div>
		</div>
	</div>
</div>		





@stop

@section('scripts')

{{-- bind student data on chane select --}}
<script type="text/javascript">

	$('#course_id').on('change', function(){

		var course_id = $(this).val();

		$.ajax({

			type: 'POST',
			dataType: 'json',
			data : {
				'course_id': course_id,
				"_token": "{{ csrf_token() }}"
			},
			url: '/dashboard/getStudent',
			success: function(data){
				console.log(data.students);
				$('#student_id').find('option').not( document.getElementById( "first-one" )).remove();
				$('#student_id').append(data.students);
			}

		});

	});

</script>


{{--Date Picker  --}}

<script type="text/javascript" src="{{asset('parsley/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{asset('date-picker/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/js/locales/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/index.js')}}"></script>
@stop