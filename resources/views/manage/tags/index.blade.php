@extends('manage/main')

@section('content')

<div class="row">
	<div class="col-md-8 ">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Manage Tags</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered"> 
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th class="text-center">Posts Relevent</th>
							<th class="text-center " width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tags as $tag)
						<tr>
							<td>{{ $tag->id }}</td>
							<td>{{ $tag->name}}</td>
							<td class="text-center">{{count($tag->posts)}}</td>
							<td>

								<a class="btn btn-primary btn-sm" href="{{route('tags.edit',$tag->id)}}"><i class="fa fa-edit"></i> Edit</a>

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
			{!! Form::open(['route' => 'tags.store', 'method'=> 'POST'])!!}

			<h4>Create New Tag</h4><hr>

			{!! Form::label('name','Name:')!!}
			{!! Form::text('name',null, ['class'=>'form-control'])!!}

			{!! Form::submit('Create New Tag', ['class'=>'btn btn-primary btn-block top-spacing2'])!!}

			{!! Form::close()!!}
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