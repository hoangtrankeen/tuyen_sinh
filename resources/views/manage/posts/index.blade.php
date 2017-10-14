@extends('manage/main')


@section('content')

<div class="panel panel-default" >
	{{-- @include('manage/posts/multi_menu/level1') --}}
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<h4>Manage Posts</h4>
			</div>
			<div class="col-xs-2 ">
				<a href="{{route('posts.create')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New Post</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Crated At</th>
				<th></th>
			</thead>
			<tbody>

				@foreach ($posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ?'...':'' }}</td>
					{{-- <td>{{ date('M j Y',strtotime($post->created_at)) }}</td>--}}
					<td><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->created_at->format('j/m/Y H:ia') }}</td>
					<td>
						<a class="btn btn-info btn-sm" href="{{route('posts.edit',$post->id)}}"><i class="fa fa-edit"></i>Edit</a>

						<form class="delete" action="{{ route('posts.destroy', $post->id) }}" method="POST">
							<input type="hidden" name="_method" value="DELETE">
							{{ csrf_field() }}
							<button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
						</form> 
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		<div class="text-center">
			{!! $posts->links(); !!}
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
