@extends('manage/main')

@section('head')
	<link rel="stylesheet" type="text/css" href="{{asset('css/navTreeview.css')}}">
@stop

@section('content')

	<div class="panel panel-default">
		@include('manage/posts/multi_menu/level1')
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
 							<td>{{ $post->created_at->format('M j, Y H:ia') }}</td>
  							<td>
 								<a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-sm">View</a>
 								<a href="{{ route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a>
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