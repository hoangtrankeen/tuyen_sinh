@section('head')
	<link rel="stylesheet" type="text/css" href="{{asset('css/navTreeview.css')}}">
@endsection

<div class="multi_menu">
	<div class="navbar navbar-default" role="navigation" style="border-radius: 0">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <a class="navbar-brand" href="#">Manage Posts</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav navbar-info">
	      	@foreach($categories as $category)
	      		@if(count($category->childs))
                <li class="dropdown">
                     <a href="{{route('manage.postscat',$category->id)}}" data-toggle="dropdown" class="dropdown-toggle">{{$category->name}} <b class="caret"></b></a>
                     
                    @include('manage/posts/multi_menu/level2',['childs' => $category->childs])	
                </li>
                @else
                <li><a href="{{route('manage.postscat',$category->id)}}">{{$category->name}}</a></li>
                @endif
            @endforeach
	    </ul>
	    <form class="navbar-form navbar-left" role="search">
	      <div class="form-group">
	        <input type="text" class="form-control" placeholder="Search">
	      </div>
	      <button type="submit" class="btn btn-default">Submit</button>
	    </form>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="#">Link</a></li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">Action</a></li>
	          <li><a href="#">Another action</a></li>
	          <li><a href="#">Something else here</a></li>
	          <li><a href="#">Separated link</a></li>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</div>
</div>