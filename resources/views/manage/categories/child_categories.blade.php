
@php
$html = $html.'|---';	
@endphp

@foreach($childs as $child)
<tr>
	<td>
		{{$child->parent() ? $html:'' }}
		<a href="{{route('categories.edit', $child->id)}}">{{$child->name}}</a>
	</td>
	<td>
		<a href="{{route('categories.edit', $child->id)}}" type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
		<form class="delete" action="{{ route('categories.destroy', $child->id) }}" method="POST">
			<input type="hidden" name="_method" value="DELETE">
			{{ csrf_field() }}
			<button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
		</form>
	</td>
</tr>	 


@if(count($child->childs))

@include('manage/categories/child_categories',['childs' => $child->childs, 'html' => $html])

@endif
@endforeach