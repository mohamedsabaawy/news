@extends('layouts.back')
@section('title','اضافة مستخدم')
@section('page')
	<a href="{{url(route('category.index'))}}">اضافة مستخدم</a>
@endsection
@section('content')

	<form role="form" action="{{url(route('user.store'))}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card-body text-right">
{{--			<input name="user_id" value="{{Auth()->user()->id}}" hidden>--}}
			<div class="form-group">
				<label for="exampleInputEmail1 "> الاسم </label>
				<input type="text" class="form-control text-right @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="الاسم" name="name" value="{{old('title')}}">
			</div>
			@error('name')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				<label for="exampleInputEmail1 "> الاميل </label>
				<input type="email" class="form-control text-right @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{old('email')}}">
			</div>
			@error('email')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				<label for="exampleInputEmail1 "> الباسورد </label>
				<input type="password" class="form-control text-right @error('password') is-invalid @enderror" id="exampleInputEmail1" name="password" value="{{old('password')}}">
			</div>
			@error('password')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				@if(count($categories)>0)
					<label for="exampleInputEmail1 ">  اختر قسم</label>
					<select class="form-control" name="categories[]" multiple>
						<option value=""> </option>
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				@endif
			</div>
			@error('category_id')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				@if(count($categories)>0)
					<label for="exampleInputEmail1 ">اختر صلاحية</label>
					<select class="form-control" name="roles[]" multiple>
						<option value=""> </option>
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach
					</select>
				@endif
			</div>
			@error('category_id')
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
	<script>
		tinymce.init({
			selector: '#details',
			plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste tinycomments tinymcespellchecker',
			toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
		});
	</script>
	@stop