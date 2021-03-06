
@extends('manage/main')

@section('title','| Manage Courses')

@section('head')
<link href="{{asset('date-picker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
@stop


@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<h4>Create New Courses</h4>
			</div>
			<div class="col-xs-2">
				<a href="{{route('courses.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
			</div>
		</div>
		

	</div>
	<div class="panel-body">
		<form method="POST" action="{{route('courses.store')}}" class="form">
			<div class="form-group">
				<label name="name">Course Name:</label>
				<input id="name" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label name="year">Year:</label>
				<input id="year" name="year"  class="form-control"></input>
			</div>
			<div class="form-group">
				<label for="exam_date" class=" control-label">Exam Date:</label>
				<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii" data-link-field="exam_date">
					<input class="form-control" size="16" type="text" value="" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				</div>
				<input type="hidden" id="exam_date" value="" name="exam_date" /><br/>
			</div>
		
			 <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> 
			 Save</button>
			{{csrf_field()}}
		</form>

	</div>

</div>


@stop

@section('scripts')



{{--Date Picker  --}}
<script type="text/javascript" src="{{asset('date-picker/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/js/locales/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/index.js')}}"></script>

@stop