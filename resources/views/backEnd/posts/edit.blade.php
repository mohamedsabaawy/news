@extends('layouts.back')
@section('title','تعديل مقال')
@section('page')
	<a href="{{url(route('post.index'))}}">المقالات</a>
@endsection
@section('content')

	<form role="form" action="{{url(route('post.update',$post->id))}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="card-body text-right">
{{--			<input name="user_id" value="{{Auth()->user()->id}}" hidden>--}}
			<div class="form-group">
				<label for="exampleInputEmail1 "> العنوان</label>
				<input type="text" class="form-control text-right @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="العنوان" name="title" value="{{$post->title}}">
			</div>
			@error('title')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				<label for="exampleInputEmail1 "> صورة</label>
				<input type="file" class="form-control text-right @error('cover') is-invalid @enderror" id="exampleInputEmail1" placeholder="العنوان" name="cover" value="{{$post->cover}}">
			</div>
			@error('cover')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				<label for="exampleInputEmail1 "> تفاصيل</label>
				<textarea class="form-control text-right @error('cover') is-invalid @enderror" id="exampleInputEmail1" placeholder="العنوان" name="details">{{$post->details}}</textarea>
			</div>
			@error('cover')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				@if(count($rows)>0)
					<label for="exampleInputEmail1 ">  اختر قسم رئسي</label>
					<select class="form-control text-right"  name="category_id" >
						<option value=""> </option>
						@foreach($rows as $row)
								<option value="{{$row->id}}" @if($post->category_id == $row->id) selected @endif style="text-align:center;" >{{$row->name}}</option>
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
			<button type="submit" class="btn btn-primary">تعديل</button>
		</div>
	</form>

@endsection