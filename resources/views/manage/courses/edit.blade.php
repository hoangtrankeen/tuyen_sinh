@section('head')
<link href="{{asset('date-picker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
@stop

@extends('manage/main')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-xs-10">
        <h4>Edit Course</h4>
      </div>

      <div class="col-xs-2">
        <a href="{{route('courses.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
      </div>
    </div>

  </div>
  <div class="panel-body">
    <div class="col-md-12" style="margin: auto;">
      <form method="POST" action="{{route('courses.update',$course->id)}}" class="form">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="form-group">
          <label name="name">Course Name:</label>
          <input type="text" id="name"  class="form-control" value="{{$course->name}}" name="name">
        </div>
        <div class="form-group">
          <label name="year">Year:</label>
          <input type="number" id="year" name="year"  class="form-control" value="{{$course->year}}"></input>
        </div>
        <div class="form-group">
          <label for="exam_date" class="control-label">Exam Date:</label>
          <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii" data-link-field="exam_date">
            <input class="form-control" size="16" type="text" value="{{date('d F, Y - H:i', strtotime($course->exam_date))}}" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
          </div>
          <input type="hidden" id="exam_date" value="{{$course->exam_date}}" name="exam_date" /><br/>
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
        
      </form>

    </div>
    
  </div>

</div>


@stop

@section('scripts')

{{--Date Picker  --}}
<script type="text/javascript" src="{{asset('date-picker/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/js/locales/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date-picker/index.js')}}"></script>

@stop