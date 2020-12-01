@extends('layouts.back')
@section('title','المقالات')
@section('page')
    <a href="{{url(route('post.index'))}}">المقالات</a>
@endsection
@section('content')
    <div class="">
        @can('post create')
            <div class="connect">
                <a class="btn btn-outline-primary float-right ml-2" href="{{(route('post.create'))}}"><i class="fa fa-plus ml-2"></i> اضافة مقال </a>
            </div>
        @endcan
    </div>

    <div class="card-body table-responsive p-0">
        @if (session('status'))
            <div class="alert alert-default-danger text-center" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if(count($rows)>0)
            {{-- start  search bar--}}
            <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="table_search" class="form-control float-right text-center" placeholder="بحث" id="search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
            {{--  end search bar --}}
            <table id="example2" class="table table-bordered table-hover table-head-fixed text-nowrap dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0">#</th>
                    <th class="sorting text-center" tabindex="0" >الصورة</th>
                    <th class="sorting text-center" tabindex="0" >العنوان</th>
                    <th class="sorting text-center" tabindex="0" width="20px" >التفاصيل</th>
                    @can('post edit')
                        <th class="sorting text-center" tabindex="0">التعديل</th>
                    @endcan
                    @can('post delete')
                        <th class="sorting text-center" tabindex="0">المسح</th>
                    @endcan

                </thead>
                <tbody class="post-list">
                @foreach($rows as $row)
                    <tr role="row" class="odd" width="20px">
                        <td class="sorting_1" tabindex="0">{{$loop->index}}</td>
                        <td class="text-center" width="20px">
                            <img width="60px" src="{{asset('storage/'.$row->cover)}}">
                        </td>
                        <td class="text-center" width="20px">{{$row->title}}</td>
                        <td class="text-center width" width="20px" >@trix($row, 'details')</td>
                        @can('post edit')
                        <td class="text-center">
                                <a href="{{url(route('post.edit',$row->id))}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                            @endcan
                        @can('post delete')
                            <td class="text-center">
                                <form action="{{url(route('post.destroy',$row->id))}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>

            </table>
{{--            {{ $posts->links() }}--}}

    </div>
    @else
        <h3 class="text-center mt-lg-4">لا يوجد بيانات</h3>

    @endif

@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        let old =$('.post-list').html();--}}
{{--        $(document).on('keyup','#search',function () {--}}
{{--            var post =$(this).val();--}}
{{--            if( post !=''){--}}
{{--                $.ajax({--}}
{{--                    url:'{{route('search')}}',--}}
{{--                    method:'GET',--}}
{{--                    data:{post},--}}
{{--                    dataType:'json',--}}
{{--                    success:function (data) {--}}
{{--                        // console.log(data);--}}
{{--                        $('.post-list').html(data.row_result);--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--            else {--}}
{{--                $('.post-list').html(old);--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}
{{--@stop--}}