
@extends('manage/main')


@section('head')

@stop
@section('title','| Create Category')
@section('content')	

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<h4>Categories</h4>
			</div>

			<div class="col-xs-2" >
				<a class="btn btn-default pull-right" href="{{route('categories.index')}}" ><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
			</div>
		</div>
		
	</div>
	<div class="panel-body">

		<div class="">

			
			<form method="POST" action="{{route('categories.store')}}" class="form" data-parsley-validate>
			
			<div class="form-group">
				<label for="name">Category</label>
				<input type="text" name="name" id="name"  class="form-control" >
			</div>

			<div class="form-group top-spacing">
				<label for="parent_id">Parent Category</label>
				<select class="form-control" name="parent_id" id="parent_id">
					<option value="0">Parent</option>
					@foreach($categories as $category)

					<option value="{{$category->id}}">{{$category->name}}</option>
					@if(count($category->childs))

					@include('manage/categories/child_create',['childs' => $category->childs, 'html'=>''])

					@endif
					@endforeach
				</select> 
			</div>
			{{csrf_field()}}	
			<button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Create Category</button>
			</form>

		</div>



	</div>
</div>
@stop


@section('scripts')
<script type="text/javascript" src="{{route('js/parsley.min.js')}}"></script>
@stop