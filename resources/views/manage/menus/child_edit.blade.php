
@php
$html = $html.'|---';
@endphp

@foreach($childs as $child)
<option {{($thismenu->parent_id == $child->id) ? 'selected':'' }}
		class="{{($thismenu->id == $child->id)? 'hide-me':''}}" value="{{$child->id}}">
		{{$child->parent() ? $html:'' }}
		{{$child->name}}
</option>

@if(count($child->childs))

@include('manage/menus/child_edit',['childs' => $child->childs->where('id','!=',$thismenu->id), 'html' => $html])

@endif
@endforeach