
{{-- @if (conditional)

// content 

@endif --}}

@if(Session::has('success'))

	<div class="notice notice-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success')}}
	</div>

@endif

@if(Session::has('error'))

	<div class="notice notice-danger" role="alert">
		<strong>Error:</strong> {{ Session::get('error')}}
	</div>

@endif

@if(count($errors) > 0)

	<div class="notice notice-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		
	</div>

@endif
