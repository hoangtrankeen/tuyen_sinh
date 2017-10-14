@extends('manage/main')

@section('title','| Create New Post')

@section ('head')

<link rel="stylesheet" href="http://parsleyjs.org/src/parsley.css">



{{-- Editor --}}
<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@stop

@section('content-header')
<h1 class="page-title">Create New Post</h1>
@stop

@section('content')

<form method="POST" action="{{route('posts.store')}}" accept-charset="UTF-8"
  enctype="multipart/form-data">
  {{csrf_field()}}
<div class="row">
	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Basic Information</h3>
			</div>
			<div class="box-body" id="slug">
				
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" v-model:value="title">
				</div>
				
				<div class="form-group">
					<label for="sub_title">Subtitle</label>
					<input type="text" name="sub_title" id="sub_title" class="form-control">
				</div>


				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" v-bind:value="slugConvert"  v-on:keyup="slugConvert" class="form-control" readonly>
				</div>
				

				<div class="form-group">
					<label for="tag">Tag</label> 
					<select class="form-control select2-multi" name="tags[]" multiple="multiple" style="width: 100%" >
						@foreach($tags as $tag)
						<option value="{{ $tag->id}}">{{ $tag->name}}</option>
						@endforeach

					</select>
				</div>
				

				<div class="form-group">
					<label for="body">Content</label>
					<textarea name="body" id="body" class="form-control"></textarea>
				</div>

			</div>

		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body">
				<div class="text">
					<button class="btn btn-success ">
						<i class="fa fa-check"></i> Save
					</button>
					<a href="{{route('menus.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
				</div>
			</div>
		</div>


		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title">Status</h4>
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<select name="is_published" id="" class="form-control">
					<option value="0">Disable</option>
					<option value="1">Activated</option>
				</select>
			</div>
		</div>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title">Featured</h4>
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<select name="is_featured" id="" class="form-control">
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select>
			</div>
		</div>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title">Template</h4>
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<select class="form-control" name="layout_id">
					<option value="">Select...</option>
					<option value="1">Free Style</option>	
					<option value="2">Former</option>	
				</select>
			</div>
		</div>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title">Category</h4>
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<select class="form-control" name="category_id">
					<option value="">Select...</option>
					@foreach($categories as $category)
					<option value="{{ $category->id}}">{{ $category->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title">Thumbnail</h4>
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<input type="file" id="file" name="image" class="filestyle" data-buttonText="Find file">

				<div class="upload-field " >

				</div>
			</div>
		</div>
	</div>
</div>

</form> 
{{-- Close Form --}}

@stop

@section('scripts')
<script src="{{asset('js/slug.js')}}"></script>
{{-- Editor --}}
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/js/froala_editor.pkgd.min.js"></script>

{{-- File Style --}}
<script type="text/javascript" src="{{asset('filestyle/js/bootstrap-filestyle.min.js')}}"></script>


<!-- Initialize the editor. -->
<script> 
	$(function() { 
		$('textarea').froalaEditor({
			heightMax: 500,
			heightMin: 300

		}) 
	}); 


</script>


<script type="text/javascript">
		$('.select2-multi').select2();
</script>
@stop	
