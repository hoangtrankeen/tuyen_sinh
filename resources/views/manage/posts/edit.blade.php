@extends('manage/main')

@section('title','| Edit Blog')


@section ('head')



{{-- Editor --}}
<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@stop

@section('content-header')
<h1 class="page-title">Edit Post</h1>
@stop

@section('content')
{!! Form::model($post,['route'=>['posts.update', $post->id], 'method' => 'PUT', 'files' => true])!!}
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
					<input type="text" name="sub_title" id="sub_title" class="form-control" value="{{$post->sub_title}}">
				</div>


				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" v-bind:value="slugConvert"  v-on:keyup="slugConvert" class="form-control" readonly>
				</div>
				

				<div class="form-group " style="width: 97%">
					{{ Form::label('tags', 'Tags:', ['class'=>'top-spacing'])}} 
					{{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi full_width','multiple' => 'multiple'])}}
				</div>

				<div class="form-group">
					<label for="body">Content</label>
					{{ Form::textarea('body',null)}}
				</div>

			</div>

		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body">
				<div class="text">
					<button class="btn btn-success ">
						<i class="fa fa-check"></i> Update
					</button>
					<a href="{{route('posts.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
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
					<option value="0"  {{($post->is_published == 0) ? 'selected':''}}>Disable</option>
					<option value="1"  {{($post->is_published == 1) ? 'selected':''}}>Activated</option>
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
					<option value="0"  {{($post->is_featured == 0) ? 'selected':''}} >No</option>
					<option value="1"  {{($post->is_featured == 1) ? 'selected':''}}>Yes</option>
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
					<option value="1" {{($post->layout_id == 1) ? 'selected':''}}>Video</option>	
					<option value="2" {{($post->layout_id == 2) ? 'selected':''}}>Normal</option>	
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
					<option value="{{ $category->id}}" {{($category->id == $post->category_id) ? 'selected':''}}>{{ $category->name}}</option>
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
					<img src="{{ asset('manage_image/posts/'.$post->image) }}" width="100%" height="auto">
				</div>
			</div>
		</div>
	</div>
</div>


{!! Form::close()!!}

@stop

@section('scripts')

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.0/js/froala_editor.pkgd.min.js"></script>


{{-- filestyle --}}
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


{{-- select2 --}}
<script type="text/javascript">
	///Vue handle the slug
	var vm = new Vue({
		el: "#slug",
		data:{
			title:'{{$post->title}}',
		},
		computed:{
			slugConvert: function (){
				var tit, slug;

				    //Lấy text từ thẻ input title 
				    tit = this.title;

				    //Đổi chữ hoa thành chữ thường
				    slug = tit.toLowerCase();

				    //Đổi ký tự có dấu thành không dấu
				    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
				    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
				    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
				    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
				    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
				    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
				    slug = slug.replace(/đ/gi, 'd');
				    //Xóa các ký tự đặt biệt
				    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
				    //Đổi khoảng trắng thành ký tự gạch ngang
				    slug = slug.replace(/ /gi, "-");
				    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
				    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
				    slug = slug.replace(/\-\-\-\-\-/gi, '-');
				    slug = slug.replace(/\-\-\-\-/gi, '-');
				    slug = slug.replace(/\-\-\-/gi, '-');
				    slug = slug.replace(/\-\-/gi, '-');
				    //Xóa các ký tự gạch ngang ở đầu và cuối
				    slug = '@' + slug + '@';
				    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
				    //In slug ra textbox có id “slug”
				    return slug;

				}	

			}


		})

</script>
<script type="text/javascript">		
	//filestyle
	//select2
	$(".select2-multi").select2();
	$(".select2-multi").select2().val({!! json_encode($post->tags->pluck('id')) !!}).trigger('change'); //get array of all id number and convert to json array 
</script>


@stop	