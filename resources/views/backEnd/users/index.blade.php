@extends('layouts.back')
@section('title','المستخدمين')
@section('page')
    <a href="{{url(route('user.index'))}}">المستخدمين</a>
@endsection
@section('content')
    <div class="">
        <div class="connect">
            <a class="btn btn-outline-primary float-right ml-2" href="{{(route('user.create'))}}"><i class="fa fa-plus ml-2"></i> اضافة مستخدم </a>
        </div>
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
                    <th class="sorting text-center" tabindex="0" >الاسم</th>
                    <th class="sorting text-center" tabindex="0" width="20px" >الايميل</th>
                    <th class="sorting text-center" tabindex="0" width="20px" >الحالة</th>
                    <th class="sorting text-center" tabindex="0" width="20px" >الاقسام</th>
                    <th class="sorting text-center" tabindex="0" width="20px" >الصلاحية</th>
                    <th class="sorting text-center" tabindex="0">التعديل</th>
                    <th class="sorting text-center" tabindex="0">المسح</th>
                </thead>
                <tbody class="user-list">
                @foreach($rows as $row)
                    <tr role="row" class="odd" width="20px">
                        <td class="sorting_1" tabindex="0">{{$loop->index}}</td>
                        <td class="text-center" width="20px">
                            <img width="60px" src="{{asset('storage/'.$row->cover)}}">
                        </td>
                        <td class="text-center" width="20px">{{$row->name}}</td>
                        <td class="text-center width" width="20px" >{{$row->email}}</td>
                        <td class="text-center width" width="20px" >
                            @if(Cache::has('user-is-online-' . $row->id))
                                <span class="text-success"><i class=""></i>Online</span>
                            @else
                                <span class="text-secondary">Offline</span>
                            @endif
                        </td>
                        <td class="text-center width" width="20px" >
                            @foreach($row->categories as $category)
                                <span class="badge bg-blue">{{$category->name}}</span>
                            @endforeach
                        </td>
                        <td class="text-center width" width="20px" >
                            @foreach($row->roles as $role)
                                <span class="badge bg-blue">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{url(route('user.edit',$row->id))}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{url(route('user.destroy',$row->id))}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
{{--            {{ $users->links() }}--}}

    </div>
    @else
        <h3 class="text-center mt-lg-4">لا يوجد بيانات</h3>

    @endif

@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        let old =$('.user-list').html();--}}
{{--        $(document).on('keyup','#search',function () {--}}
{{--            var user =$(this).val();--}}
{{--            if( user !=''){--}}
{{--                $.ajax({--}}
{{--                    url:'{{route('search')}}',--}}
{{--                    method:'GET',--}}
{{--                    data:{user},--}}
{{--                    dataType:'json',--}}
{{--                    success:function (data) {--}}
{{--                        // console.log(data);--}}
{{--                        $('.user-list').html(data.row_result);--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--            else {--}}
{{--                $('.user-list').html(old);--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}
{{--@stop--}}