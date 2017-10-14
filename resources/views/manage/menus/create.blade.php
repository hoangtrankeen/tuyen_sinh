@extends('manage/main')

@section('head')

<link rel="stylesheet" href="http://parsleyjs.org/src/parsley.css">

@section('style')
<style type="text/css">
#url {

}
#url-clear {
	position: absolute;
	right: 5px;
	top: 0;
	bottom: 0;
	height: 14px;
	margin: auto;
	font-size: 14px;
	cursor: pointer;
	color: #ccc;
}
</style>
@stop

@section('content-header')
<h1 class="page-title">Create New Menu</h1>
@stop

@section('content')
<form method="POST" action="{{route('menus.store')}}" class="form">
	{{csrf_field()}}
	<div class="row" id="slug">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Basic Information</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="name">Menu</label>
						<input type="text" name="name" id="name"  class="form-control" v-model:value="title">
					</div>

					<div class="form-group">
						<label for="slug">Slug</label>
						<input type="text" name="slug" class="form-control" v-bind:value="slugConvert"  v-on:keyup="slugConvert" readonly>
					</div>

					<div class="form-group">
						<label for="category_id">Category</label>
						<select class="form-control chose_field twofield" name="category_id" id="category_id">
							<option value="">Select...</option>
							@foreach($categories as $category)

							<option value="{{$category->id}}">{{$category->name}}</option>

							@if(count($category->childs))

							@include('manage/categories/child_create',['childs' => $category->childs, 'html'=>''])

							@endif
							@endforeach
						</select> 
					</div>

					<div class="form-group">
						<label for="post_id">Post</label>
						<select class="form-control chose_field twofield" name="post_id" id="post_id">
							<option value="">Select..</option>
							@foreach($posts as $post)
							<option value="{{$post->id}}">{{$post->title}}</option>
							@endforeach 

						</select>
					</div>

					<div class="form-group">
						<label for="url">Url</label>
						<div class="btn-group" style="width:100% ">
							<input type="text" name="url" class="form-control chose_field"  id="url">
							<span id="url-clear" class="glyphicon glyphicon-remove-circle"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="parent_id">Parent Menu</label>
						<select class="form-control" name="parent_id" id="parent_id">
							<option value="0">Select..</option>
							@foreach($parents as $parent)

							<option value="{{$parent->id}}">{{$parent->name}}</option>
							@if(count($parent->childs))

							@include('manage/menus/child_create',['childs' => $parent->childs, 'html'=>''])

							@endif
							@endforeach
						</select> 
					</div>
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
						<a href="{{route('menus.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
					</div>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">Status</h4>
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<select name="status" id="" class="form-control">
						<option value="0">Disable</option>
						<option value="1">Activated</option>
					</select>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">Order</h4>
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<input type="number" name="order" min="1" id="menu_order" class="form-control">
				</div>
			</div>
		</div>	

	</div>
</form>

@stop

@section('scripts')

{{-- Slug handler --}}
<script src="{{asset('js/slug.js')}}"></script>

<script type="text/javascript">
	
	$('#post_id').select2({

	});
	// Select post handle
	// $(".js-example-data-array").select2({

	// 	ajax: {
	// 		type: 'get',
	// 		url: '/dashboard/searchpost',
	// 		dataType: 'json',
	// 		delay: 250,
	// 		data: function(params) {
	// 			return {'search': params.term};
	// 		},
	// 		processResults: function(data, page){
	// 			return {results: data};
	// 		}
	// 	},
	// 	placeholder: 'Chose a Post',
	// 	allowClear: true,
	// });


	// Search option



	// select option handle, dusable all when slelect is changed

	// select option handle, dusable all when slelect is changed

	$(".chose_field").each(function(e){
		if($(this).val()){
			$(".chose_field").attr('disabled',true);
			$(this).attr('disabled',false);
			if(!$(this).find('option:selected').val()){
				$(".chose_field").attr('disabled',false);
			}
		}
	});

	$(".chose_field").change(function () {
		$(".chose_field").attr('disabled',true);
		$(this).attr('disabled',false);
		if(!$(this).find('option:selected').val()){
			$(".chose_field").attr('disabled',false);
		}
	});

	// Input handle, disable all when input is focused

	$("input[name='url']").focus(function(){
		$(".twofield").val('');
		$(".twofield").attr('disabled', true);		
	});

	$("input[name='url']").blur(function(){
		$(".twofield").attr('disabled', true);
		if(!$("input[name='url']").val()){
			$(".twofield").attr('disabled', false);
		}			
	});

	$("#url-clear").click(function(){
		
		$(".twofield").attr('disabled', false);
		$("input[name='url']").val("");
	});



</script>

@stop	
