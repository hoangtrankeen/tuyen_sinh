@extends('manage/main')

@section('content')

<div class="row">
	<div class="col-md-8 ">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Manage Tags</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped"> 
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Posts Relevent</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						 @php $stt = 1 @endphp
						@foreach($tags as $tag)
						<tr>
							<td>{{$stt++}}</td>
							<td>{{ $tag->name}}</td>
							<td>{{count($tag->posts)}}</td>
							<td>
								<a class="btn btn-primary btn-sm " href="{{route('tags.edit',$tag->id)}}"><i class="fa fa-edit"></i> Edit</a>
								<form class="delete" action="{{ route('tags.destroy', $tag->id) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									{{ csrf_field() }}
									<button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
								</form> 
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
		</div>	
	</div> {{-- end 8 col --}}
	<div class="col-md-3">
		<div class="well">
			{!! Form::open(['route' => ['tags.update',$theTag->id], 'method'=> 'PUT'])!!}

			<h4>Edit #{{$tag->id}} <b></b></h4>

			{!! Form::label('name','Name:')!!}
			{!! Form::text('name',$theTag->name, ['class'=>'form-control'])!!}

			{!! Form::submit('Save Change', ['class'=>'btn btn-primary btn-block top-spacing2'])!!}

			{!! Form::close()!!}
		</div>
	</div>
</div>

@stop

	