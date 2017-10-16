
@extends('manage/main')

@section('title','| Edit Category')
@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('parsley/parsley.css')}}">
@stop
@section('title','| Edit Category')
@section('content')	

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<h4>Edit Category</h4>
			</div>

			<div class="col-xs-2">
				<a href="{{route('categories.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
			</div>
		</div>
	</div>
	<div class="panel-body">

		<div class="">

			<form method="POST" action="{{route('categories.update',$thiscat->id)}}" class="form" data-parsley-validate>
				{{method_field('PUT')}}
				{{csrf_field()}}

				<div class="form-group">
					<label for="name">Category</label>
					<input type="text" name="name" id="name" value="{{$thiscat->name}}" class="form-control" required>
				</div>

				<div class="form-group top-spacing">
					<label for="parent_id">Parent Category</label>
					<select value="{{$thiscat->parent_id}}" class="form-control" name="parent_id" id="parent_id">
						<option value="0">Parent</option>
						@foreach($categories as $category)

							<option {{(($category->id) ==($thiscat->parent_id)) ? 'selected':'' }} 
								value="{{$category->id}}" 
								class="">
								{{$category->name}}
							</option>
							
							@if(count($category->childs))

							@include('manage/categories/child_edit',['childs' => $category->childs, 'html'=>''])

							@endif
						
						@endforeach
					</select> 
				</div>


				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save Change</button>
			</form>

		</div>



	</div>
</div>
@stop


@section('scripts')
<script type="text/javascript" src="{{asset('parsley/parsley.min.js')}}"></script>
@stop