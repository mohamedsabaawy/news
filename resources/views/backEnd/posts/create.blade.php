@extends('layouts.back')
@section('title','اضافة مقال')
@section('page')
	<a href="{{url(route('category.index'))}}">المقالات</a>
@endsection
@section('content')

	<form role="form" action="{{url(route('post.store'))}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card-body text-right">
{{--			<input name="user_id" value="{{Auth()->user()->id}}" hidden>--}}
			<div class="form-group">
				<label for="exampleInputEmail1 "> العنوان </label>
				<input type="text" class="form-control text-right @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="العنوان" name="title" value="{{old('title')}}">
			</div>
			@error('name')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				<label for="exampleInputEmail1 "> صورة </label>
				<input type="file" class="form-control text-right @error('cover') is-invalid @enderror" id="exampleInputEmail1" name="cover" value="{{old('cover')}}">
			</div>
			@error('name')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				<label for="exampleInputEmail1 "> التفاصيل </label>
				<textarea class="form-control text-right @error('details') is-invalid @enderror " id="details" name="details" value="{{old('details')}}"></textarea>
{{--				<input type="text" name="details" hidden >--}}
{{--				@trix(\App\Models\Post::class, 'details')--}}

			</div>
			@error('name')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				@if(count($rows)>0)
					<label for="exampleInputEmail1 ">  اختر قسم</label>
					<select class="form-control" name="category_id" >
						<option value=""> </option>
						@foreach($rows as $row)
							<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</select>
				@endif
			</div>
			@error('name')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<!-- /.card-body -->

		<div class="card-footer text-center">
			<button type="submit" class="btn btn-primary">اضافة</button>
		</div>
	</form>
@endsection
@section('script')
{{--	<script>--}}
{{--		tinymce.init({--}}
{{--			selector: '#details',--}}
{{--			plugins: 'image a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste tinycomments tinymcespellchecker',--}}
{{--			// toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',--}}
{{--		});--}}
{{--	</script>--}}
	<script>
		// $('#lfm').filemanager('image', {prefix: route_prefix});
		var options = {
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
			filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
		};
		CKEDITOR.replace('details', options);
	</script>
	@stop