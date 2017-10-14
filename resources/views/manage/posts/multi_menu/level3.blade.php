<ul class="dropdown-menu">
@foreach($childs as $child)
	@if(count($child->childs))
		<li class="dropdown-submenu">
		      <a tabindex="-1" href="{{route('manage.postscat',$child->id)}}">{{$child->name}}</a>
				@include('manage/posts/multi_menu/level3',['childs' => $child->childs])
		</li>
	@else
		<li><a href="{{route('manage.postscat',$child->id)}}">{{$child->name}}</a></li>			
	@endif
@endforeach
</ul>