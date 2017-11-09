@extends('manage.main')
@section('title', '| Send Email')
@section('head')

<!-- Include Editor style. -->
<link href="{{asset('froala_editor/css/froala_editor.pkgd.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('froala_editor/css/froala_style.min.css')}}" rel="stylesheet" type="text/css" />


<link type="text/css" rel="stylesheet" href="{{asset("loadingjs/loadingme/waitMe.css")}}">

{{-- checkbox style --}}
<link href="{{asset('checkboxlist/main.css')}}" rel="stylesheet" type="text/css" />

<style type="text/css">
#listEmail {
	margin-top: 8px;
	max-height: 300px;
	overflow: auto;
}
</style>
@stop

@section('content-header')
<h1 class="page-title">Sending Email to Student</h1>
@stop
@section('content')
<form method="POST" action="{{route('mailer.send')}}" class="form" >
	{{csrf_field()}}
	<div class="row" >
		<div class="col-md-8">
			<div id="loadingme">
				
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					{{-- 	<h3 class="box-title">Basic Information</h3> --}}
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="title">Title</label>
						<input name="title"  class="form-control" required="required"></input>
					</div>
					<div class="form-group">
						<label for="content">Content</label>
						<textarea class="form-control" rows="10" id="content" name="content" required></textarea>
					</div>
					
					<button type="submit" class="btn btn-success" id="submit">
						<span class="glyphicon glyphicon-send"></span> Send
					</button>
				</div>
			</div>			
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Select Reciever</h3>
				</div>
				<div class="box-body">
					<div  class="form-group">
						<label for="course">Course</label>
						<select class="form-control" id="course">
							<option value="all">Select..</option>
							@foreach($courses as $course)
							<option value="{{$course->id}}">{{$course->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group" id="students-binding">
						<label><input type="checkbox" id="checkAll" status="unchecked"> Check all</label>
						<div class="well" id="listEmail">
							@foreach($students as $student)
							<label><input type="checkbox" / value="{{$student->email}}"> {{$student->name}} </label><br>
							@endforeach		
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>	
</form>

@stop

@section('scripts')

<script type="text/javascript">

	var emailArr = [];


	$(document).on('change','#course', function(){
		console.log($(this).val());
		var course = $(this).val();

		$.ajax({
			async: true, 
			type:"GET",
			url:'/dashboard/getstudentemail',
			data:{'course': course},
			success: function(data){
				$("#listEmail").empty();
				emailArr = [];
				$("#checkAll").prop('checked', false); 
				$("#checkAll").attr('status','unchecked'); 
				$("#listEmail").append(data.html);
			},
			error: function(data){}
		});
	});


	$("#checkAll").change(function () {
		$("#listEmail input:checkbox").prop('checked', $(this).prop("checked"));

		if($(this).attr('status') == 'unchecked'){
			emailArr = [];
			$(this).attr('status','checked');
			$("#listEmail input:checkbox").each(function(){
				var singlEmail = $(this).val();
				emailArr.push(singlEmail);
				console.log(emailArr);
			});

		}else if($(this).attr('status') == 'checked'){
			$(this).attr('status', 'unchecked');
			$("#listEmail input:checkbox").each(function(){
				var singlEmail = $(this).val();
				emailArr.splice(emailArr.indexOf(singlEmail),1);
				console.log(emailArr);
			});
		}
		
	});

	$(document).on('click',"#listEmail input:checkbox", function(){
		var singlemail = $(this).val();
		if($.inArray( singlemail, emailArr) == -1){
			emailArr.push(singlemail);
			console.log(emailArr);
			console.log($("#content").val());
		}
		else if($.inArray(singlemail, emailArr) > -1){
			emailArr.splice(emailArr.indexOf(singlemail),1);
			console.log(emailArr);
		}

	});	
		//if send butt is click send email 
		$('form').on('submit',function(e){

			e.preventDefault(e);
			$('body').waitMe({
				effect : 'bounce',
				text : '',
				bg : "rgba(255,255,255,0.7)",
				color : "#000",
				maxSize : '',
				waitTime : -1,
				textPos : 'vertical',
				fontSize : '',
				source : '',
				onClose : function() {}
			});

			
			$.ajaxSetup(
			{
				headers:{'X-CSRF-Token': $('input[name="_token"]').val()}
			});

			console.log(emailArr);
			var formData = {
				'email'      : emailArr,
				'title'    : $('input[name=title]').val(),
				'content'    : $('#content').val()
			};

			$.ajax({
				type:"POST",
				url:'/dashboard/sendemail',
				data:formData,
				success: function(data){
					console.log(data);
					$("body").waitMe("hide");
					if(data.err){
						toastr.error(data.err);
					}
					else if(data.success){
						toastr.success(data.success);
					}
					else if(data.exc){
						toastr.warning(data.exc);
					}
					
					toastr.options.closeMethod = 'fadeOut';
					toastr.options.closeDuration = 300;
					toastr.options.closeEasing = 'swing';
				},
				error: function(data){}
			});
		});

		$('.select2-multi').select2();

	</script>

	<script type="text/javascript">
		$(function() { 
			$('textarea').froalaEditor({
				heightMax: 500,
				heightMin: 300

			}) 
		}); 
	</script>
	{{-- Loading Js beautiful --}}
	<script src="{{asset('loadingjs/toastr.min.js')}}"></script>
	<link href="{{asset('loadingjs/toastr.min.css')}}" rel="stylesheet">

	{{-- Checkboxlist Style --}}
	<script src="{{asset('checkboxlist/main.js')}}"></script>

	<!-- Include Editor JS files. -->
	<script type="text/javascript" src="{{asset('froala_editor/js/froala_editor.pkgd.min.js')}}"></script>
	
	{{-- loading me --}}
	<script src="{{asset('loadingjs/loadingme/waitMe.js')}}"></script> 

	@stop




{{-- 
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=6d10938a8d5c34
MAIL_PASSWORD=c1ccb2313ee0e3
MAIL_ENCRYPTION=null
 --}}