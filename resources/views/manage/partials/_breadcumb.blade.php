<ul class="breadcrumb" style="  text-transform: capitalize;">
			@php	
			$url = '';
			@endphp
			<li>

				@for($i = 0; $i <= count(Request::segments()); $i++)

				@php
				$url= $url.Request::segment($i).'/';
				@endphp

				<a href="{{$url}}">{{Request::segment($i)}}</a>

				@if($i < count(Request::segments()) & $i > 0)
				{!!'<i class="fa fa-angle-right"></i>'!!}
				@endif
				
			</li>
			@endfor
		</ul>