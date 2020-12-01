@extends('layouts.back')
@section('title','الاقسام')
@section('page')
    <a href="{{url(route('category.index'))}}">الاقسام</a>
@endsection
@section('content')
    <div class="">
        <div class="connect">
            <a class="btn btn-outline-primary float-right ml-2" href="{{(route('category.create'))}}"><i class="fa fa-plus ml-2"></i> اضافة قسم </a>
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
                    <th class="sorting text-center" tabindex="0" >الاسم</th>
                    <th class="sorting text-center" tabindex="0" >قسم الرئسي</th>
{{--                    <th class="sorting text-center" tabindex="0" width="20px" >التفاصيل</th>--}}
                    <th class="sorting text-center" tabindex="0">التعديل</th>
                    <th class="sorting text-center" tabindex="0">المسح</th>
                </thead>
                <tbody class="category-list">
                @foreach($rows as $row)
                    <tr role="row" class="odd" width="20px">
                        <td class="sorting_1" tabindex="0">{{$loop->index}}</td>
                        <td class="text-center" width="20px">{{$row->name}}</td>
                        <td class="text-center" width="20px">
                            @if($row->master_id)
                                @foreach($rows as $r)
                                    @if($r->id == $row->master_id)
                                        {{$r->name}}
                                    @endif
                                @endforeach
                            @endif
                        </td>
{{--                        <td class="text-center width" width="20px" >{{$go->details}}</td>--}}
                        <td class="text-center">
                            <a href="{{url(route('category.edit',$row->id))}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{url(route('category.destroy',$row->id))}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
{{--            {{ $categorys->links() }}--}}

    </div>
    @else
        <h3 class="text-center mt-lg-4">لا يوجد بيانات</h3>

    @endif

@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        let old =$('.category-list').html();--}}
{{--        $(document).on('keyup','#search',function () {--}}
{{--            var category =$(this).val();--}}
{{--            if( category !=''){--}}
{{--                $.ajax({--}}
{{--                    url:'{{route('search')}}',--}}
{{--                    method:'GET',--}}
{{--                    data:{category},--}}
{{--                    dataType:'json',--}}
{{--                    success:function (data) {--}}
{{--                        // console.log(data);--}}
{{--                        $('.category-list').html(data.row_result);--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--            else {--}}
{{--                $('.category-list').html(old);--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}
{{--@stop--}}