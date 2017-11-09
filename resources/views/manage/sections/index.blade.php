@extends('manage.main')


@section('content')
@php

@endphp
<form method="POST" action="{{route('sections.store')}}" class="form" data-parsley-ui-enabled="false" data-parsley-validate>
	{{csrf_field()}}
	<div class="container-fluid">
		<!-- Header with Background Image -->
		<header class="business-header">
			<div class="container">
				<div class="well">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="display-3 text-center text-white mt-4">SLIDER</h1>
						</div>
					</div>
				</div>
				
			</div>
		</header>
		<!-- Page Content -->
		<div class="container">		
			<div class="row">
				@foreach($sections as $section)
				<div class="col-sm-12">
					<div class="well">				
						<div class="box box-primary">
							<div class="box-header with-border">
								<h4 class="box-title"><strong>Position {{$section->position}}</strong></h4>
								<div class="box-tools">
									<button type="button" class="btn btn-box-tool" data-widget="collapse">
										<i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group">
									<label for="title">Position Title</label>
									<input type="text" name="title{{$section->position}}" class="form-control" value="{{$section->title}}">
								</div>
								<div class="form-group">
									<label for="title">Description</label>
									<textarea type="text" name="description{{$section->position}}" class="form-control" value="{{$section->description}}"></textarea>
								</div>
								<div class="form-group">
									<label for="category_id">Category</label> 
									<select class="form-control select2-multi" name="cate_id{{$section->position}}[]" multiple="multiple" style="width: 100%" >
										@foreach($categories as $category)
										<option value="{{$category->id}}" {{ in_array($category->id,json_decode($section->cate_id) )?'selected':''}}>{{ $category->name}}</option>
										@endforeach

									</select>
								</div>

								<div class="form-group">
									<label for="title">Number of List Posts</label>
									<input type="number" name="num_links{{$section->position}}" class="form-control" value="{{$section->num_links}}">
								</div>
								<div class="form-group">
									<label for="title">Limit Posts</label>
									<input type="number" name="limit{{$section->position}}" class="form-control" value="{{$section->limit}}">
								</div>			
							</div>
						</div>
					</div>
				</div>
				@endforeach		
			</div>
		</div>
	</div>
	<!-- /.container -->
	<button class="btn btn-success ">
		<i class="fa fa-check"></i> Update
	</button>
</div>

</form>
@stop


@section('scripts')

<script type="text/javascript">

	$('.select2-multi').select2();
	

</script>


@stop
