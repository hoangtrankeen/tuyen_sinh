
@php
$html = $html.'|---';
@endphp

@foreach($childs as $child)
<option value="{{$child->id}}">
	{{$child->parent() ? $html:'' }}
	{{$child->name}}
</option>

@if(count($child->childs))

@include('manage/categories/child_create',['childs' => $child->childs, 'html' => $html])

@endif
@endforeach