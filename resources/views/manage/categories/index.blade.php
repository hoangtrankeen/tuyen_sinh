@extends('manage/main')


@section('title','| Manage Categories')
@section('head')

@stop

@section('title','| Manage Category')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<h4>Manage Category</h4>
			</div>

			<div class="col-xs-2">
				<a class="btn btn-primary pull-right" href="{{route('categories.create')}}" ><i class="fa fa-plus" aria-hidden="true"></i> Create New Category</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="">
			<div class="">
				<table class=" table table-striped table-bordered" >
					<thead>					
						<th>Category</th>
						<th>Action</th>
					</thead>
					@foreach($categories as $category)		
					<tr>
						<td>
							<a href="{{route('categories.edit','$category->id')}}">{{$category->name}}</a>
						</td>

						<td>
							<a class="btn btn-info btn-sm " href="{{route('categories.edit',$category->id)}}"><i class="fa fa-edit"></i> Edit</a>

							<form class="delete" action="{{ route('categories.destroy', $category->id) }}" method="POST">
								<input type="hidden" name="_method" value="DELETE">
								{{ csrf_field() }}
								<button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
							</form> 
						</td>
					</tr>
					@if(count($category->childs))

					@include('manage/categories/child_categories',['childs' => $category->childs, 'html'=>''])

					@endif
					@endforeach
				</table>
				<div class="text-center">
					{!! $categories->links(); !!}
				</div>
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