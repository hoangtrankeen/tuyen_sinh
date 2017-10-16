@extends('manage/main')

@section('title','| Manage Menu')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('parsley/parsley.css')}}">
@stop

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<h4>Manage Menu</h4>
			</div>

			<div class="col-xs-2 ">
				<a class="btn btn-primary pull-right" href="{{route('menus.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Create New Menu</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="">
			<div class="">
				<table class=" table table-striped table-bordered " >
					<thead>
						<th>#</th>
						<th>Menu</th>
						<th>Category</th>
						<th>Url</th>
						<th>Post</th>
						<th>Order</th>
						<th>Action</th>
					</thead>
					@foreach($parents as $parent)
					<tr>
						<td></td>
						<td>
							<a href="{{route('menus.edit', $parent->id)}}">{{$parent->name}}</a>
						</td>
						<td>{{($parent->category['name'])}}</td>
						<td>{{$parent->url}}</td>
						<td>{{$parent->post['title']}}</td>
						<td>{{$parent->order}}</td>
						<td>
							<a href="{{route('menus.edit', $parent->id)}}" type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
							<form class="delete" action="{{ route('menus.destroy', $parent->id) }}" method="POST">
								<input type="hidden" name="_method" value="DELETE">
								{{ csrf_field() }}
								<button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
							</form> 
						</td>
						

					</tr>
					@if(count($parent->childs))

					@include('manage/menus/child_menu',['childs' => $parent->childs, 'html'=>''])

					@endif
					@endforeach
				</table>
			</div>
		</div>
		
	</div>
</div>

@stop


@section('scripts')

<script>

	function confirmDelete()
	{
		return confirm("Do you want to delete this menu?");
	}
	
</script>
@stop