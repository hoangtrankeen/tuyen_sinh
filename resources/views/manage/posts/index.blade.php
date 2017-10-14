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
		
		<table class="table table-success">
			<thead class="success">
				<th>#</th>
				<th>Title</th>
				<th>Author</th>
				<th>Status</th>
				<th>Crated At</th>
				<th>Modifed At</th>
				<th>Action</th>
			</thead>
			<tbody>
				@php
					$stt = 1
				@endphp
				@foreach ($posts as $post)
				<tr>
					<th>{{ $stt++ }}</th>
					<td><a href="{{route('posts.edit',$post->id)}}">
						{{ substr(strip_tags($post->title), 0, 100) }}{{ strlen(strip_tags($post->title)) > 100 ?'...':'' }}
					</a><br>
						<small>Category: {{$post->category->name}}</small>
					</td>
					<td>{{$post->user->name}}</td>
					<td>
						@if($post->is_published)
							<span class="label label-info">Activated</span><br>

							@if($post->is_featured)
								
								<span class="label label-primary">Featured</span>

							@endif
						@else
							<span class="label label-default">Disabled</span><br>
						
						@endif
					</td>
					
					<td>{{ $post->created_at->format('j/m/Y ') }}<br>{{ $post->created_at->format(' H:ia') }}</td>
					<td>{{ $post->updated_at->format('j/m/Y ') }}<br>{{ $post->updated_at->format(' H:ia') }}</td>
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
