<ul class="dropdown">
  @foreach($childs as $child)
  <li><a href="{{route('route.slug',$child->slug)}}">{{$child->name}}</a>

    @if(count($child->childs))      
      @include('frontend/partials/_submenu',['childs' => $child->childs, 'html'=>''])
    @endif

  </li>
  @endforeach
</ul>