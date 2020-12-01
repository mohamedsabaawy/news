@extends('layouts.back')
@section('title','اضافة صلاحية')
@section('page')
    <a href="{{url(route('category.index'))}}">اضافة صلاحية</a>
@endsection
@section('content')

    <form role="form" action="{{url(route('role.store'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body text-right">
            {{--			<input name="role_id" value="{{Auth()->role()->id}}" hidden>--}}
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
                <label for="exampleInputEmail1 "> الصلاحيات </label>
                <div class="col-3 text-right">
                    @foreach($perm as $permission)
                        <input type="checkbox" value="{{$permission->id}}" name="permission[]">{{$permission->name}}
                    @endforeach
                </div>
            </div>
            @error('permission')
            <span class="alert alert-danger small-box text-right" role="alert" >
					<strong>{{ $message }}</strong>
				</span>
            @enderror

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