@extends('layouts.back')
@section('title','تعديل قسم')
@section('page')
	<a href="{{url(route('category.index'))}}">الاقسام</a>
@endsection
@section('content')

	<form role="form" action="{{url(route('category.update',$category->id))}}" method="post">
		@csrf
		@method('PUT')
		<div class="card-body text-right">
{{--			<input name="user_id" value="{{Auth()->user()->id}}" hidden>--}}
			<div class="form-group">
				<label for="exampleInputEmail1 "> الاسم</label>
				<input type="text" class="form-control text-right @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="الاسم" name="name" value="{{$category->name}}">
			</div>
			@error('name')
				<span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<div class="form-group">
				@if(count($rows)>0)
					<label for="exampleInputEmail1 ">  اختر قسم رئسي</label>
					<select class="form-control text-right"  name="master_id" >
						<option value=""> </option>
						@foreach($rows as $row)
								<option value="{{$row->id}}" @if($category->master_id == $row->id) selected @endif style="text-align:center;" >{{$row->name}}</option>
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