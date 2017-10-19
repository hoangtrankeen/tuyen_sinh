<tr>
	@php
	$html = $html.'|---'
	@endphp
	@foreach($childs as $child)
	<td></td>
	<td>
		{{$child->parent() ? $html:'' }}
		<a href="{{route('menus.edit', $child->id)}}">
			{{$child->name}}</a>
		</td>
		<td>{{($child->category['name'])}}</td>
		<td>{{$child->url}}</td>
		<td>{{$child->post['title']}}</td>
		<td>{{$child->order}}</td>
		<td>
			<a href="{{route('menus.edit', $child->id)}}" type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
			<form class="delete" action="{{ route('menus.destroy', $child->id) }}" method="POST">
				<input type="hidden" name="_method" value="DELETE">
				{{ csrf_field() }}
				<button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
			</form> 
		</td>
</tr>
	@if(count($child->childs))

	@include('manage/menus/child_menu',['childs' => $child->childs, 'html' => $html])

	@endif
	@endforeach