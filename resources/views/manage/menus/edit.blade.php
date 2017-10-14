@extends('manage/main')

@section('head')

<link rel="stylesheet" href="http://parsleyjs.org/src/parsley.css">

@section('style')
<style type="text/css">
.select2-results__options {
	max-height: 500px;
}

#url {

}
#url-clear {
	position: absolute;
	right: 5px;
	top: 0;
	bottom: 0;
	height: 14px;
	margin: auto;
	font-size: 14px;
	cursor: pointer;
	color: #ccc;
}
</style>
@stop

@section('content-header')
<h1 class="page-title">Edit Menu #{{$thismenu->id}}</h1>
@stop

@section('content')
{{-- {{dd($thismenu->childs->where('id','!=',$thismenu->id))}} --}}
<form method="POST" action="{{route('menus.update',$thismenu->id)}}" class="form">
	{{method_field('PUT')}}
	{{csrf_field()}}
	<div class="row" id="slug">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Basic Information</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="name">Menu</label>
						<input type="text" name="name" id="name"  class="form-control"  v-model="title">
					</div>
					<div class="form-group">
						<label>Slug</label>
						<input type="text" name="slug" v-bind:value="slugConvert"  v-on:keyup="slugConvert" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="category_id">Category</label>
						<select value="{{$thismenu->category_id}}" class="form-control chose_field twofield" name="category_id" id="category_id">
							<option value="">Select...</option>
							@foreach($categories as $category)

							<option {{(($category->id) ==($thismenu->category_id)) ? 'selected':'' }} 
								value="{{$category->id}}" 
								class="">
								{{$category->name}}
							</option>

							@if(count($category->childs))
							@include('manage/menus/child_cat_edit',['childs' => $category->childs, 'html'=>''])
							@endif	

							@endforeach
						</select> 
					</div>

					<div class="form-group">
						<label for="post_id">Post</label>
						<select class="form-control chose_field twofield" name="post_id" id="post_id" style="width: 100%">
							<option value="">Select...</option>
							@foreach($posts as $post)
							<option value="{{$post->id}}"
								{{($post->id == $thismenu->post_id)?'selected':''}}>{{$post->title}}
							</option>
							@endforeach 
						</select>
					</div>

					<div class="form-group">
						<label for="url">Url</label>
						<div class="btn-group" style="width:100% ">
							<input type="text" name="url" class="form-control chose_field" value="{{$thismenu->url}}" id="url">
							<span id="url-clear" class="glyphicon glyphicon-remove-circle"></span>
						</div>

					</div>

					<div class="form-group">
						<label for="parent_id">Parent Menu</label>
						<select class="form-control" name="parent_id" id="parent_id">
							<option value="0">Chose Parent Menu</option>
							@foreach($parents as $parent)

							<option value="{{$parent->id}}" 
								{{($thismenu->parent_id == $parent->id)?'selected':''}}
								class="">
								{{$parent->name}}
							</option>
							@if(count($parent->childs))
							@include('manage/menus/child_edit',['childs' => $parent->childs, 'html'=>''])
							@endif
							@endforeach
						</select> 
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
					<select name="status" id="" class="form-control">
						<option value="0" {{($thismenu->status==0)?'selected':''}}>Disable</option>
						<option value="1" {{($thismenu->status==1)?'selected':''}}>Active</option>
					</select>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">Order</h4>
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<input type="number" name="order" min="1" id="menu_order" class="form-control" value="{{$thismenu->order}}">
				</div>
			</div>
		</div>
	</div>
</form>

@stop

@section('scripts')

{{-- handle slug --}}
<script type="text/javascript">
	///Vue handle the slug
	var vm = new Vue({
		el: "#slug",
		data:{
			title:'{{$thismenu->name}}',
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

	// Search option
	$('#post_id').select2();
	// select option handle, dusable all when slelect is changed

	$(".chose_field").each(function(e){
		if($(this).val()){
			$(".chose_field").attr('disabled',true);
			$(this).attr('disabled',false);
			if(!$(this).find('option:selected').val()){
				$(".chose_field").attr('disabled',false);
			}
		}
	});

	$(".chose_field").change(function () {
		$(".chose_field").attr('disabled',true);
		$(this).attr('disabled',false);
		if(!$(this).find('option:selected').val()){
			$(".chose_field").attr('disabled',false);
		}

	});



	// Input handle, disable all when input is focused

	$("input[name='url']").focus(function(){
		$(".twofield").val('');
		$(".twofield").attr('disabled', true);

	});
	$("input[name='url']").blur(function(){
		$(".twofield").attr('disabled', true);
		if(!$("input[name='url']").val()){
			$(".twofield").attr('disabled', false);
		}
	});

	// iNPUT handler when had already a value

	if($("input[name='url']").val()){
		$(".twofield").attr('disabled', true);
	}


	$("#url-clear").click(function(){
		
		$(".twofield").attr('disabled', false);
		$("input[name='url']").val("");

	});


</script>



@stop	


