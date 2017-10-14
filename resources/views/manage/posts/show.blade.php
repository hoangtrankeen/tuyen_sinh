
@extends('manage/main')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">

				<div class="panel-body">
					<img src="{{ asset('manage_image/posts/'.$post->image) }}" width="100%">
					<h1>{{ $post->title }}</h1>
					<p class="lead">{!! nl2br($post->body) !!}</p>
					<hr>
							
					<div class="tags">
						@foreach ($post->tags as $tag)
							<span class="label label-default">{{ $tag->name}}</span>
						@endforeach
					</div>	
				</div>				
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					{{-- <p><a href="{{ route('blog.single',$post->slug) }}">{{(route('blog.single',$post->slug))}}</a></p>  --}}(future update will be like this 'http://post/{{$post->slug}}' )
				</dl>

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name}}</p> 
				</dl>

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</p> 
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated: </label>
					<p>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
				  	<div class="col-sm-6">
				   		<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-wrench"></span> Edit</a>
				 	</div>
				  	<div class="col-sm-6">
						{!!Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE'])!!}
				  
				   		{!!Form::submit('Delete', ['class'=>'btn btn-block btn-danger btn-block'])!!}

				   		{!! Form::close()!!}
				  	</div>
				</div>﻿
				<div class="row">
					<div class="col-sm-12">
						<a href="{{ route('posts.index') }}" class="btn btn-block btn-default text-center"><span class="glyphicon glyphicon-backward"></span> View all the blog</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

@stop

@section('scripts')
	<script>
		
		$('span[label]').each(function(index,value){
			$(this).addClass( "myClass yourClass" );
		});
	</script>
	
@stop




{{-- form for not using form helper --}}
{{-- <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
    <input type="submit" value="Delete" class="btn btn-danger btn-block">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
   {{ method_field('DELETE') }}
   or can use <input type="hidden" name="_method" value="DELETE">

</form>﻿ --}}