@extends('layouts.back')
@section('title','جميع الصلاحيات')
@section('page')
    <a href="{{url(route('role.index'))}}">الصلاحيات</a>
    @endsection
@section('content')

    <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <a class="btn btn-primary" href="{{(route('role.create'))}}"><i class="fa fa-plus"></i> اضافة صلاحية </a>
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0">#</th>
                <th class="sorting" tabindex="0" >الاسم</th>
                <th class="sorting" tabindex="0" >guard name</th>
                <th class="sorting" tabindex="0" >permission list</th>
                <th class="sorting text-center" tabindex="0">Edit</th>
                <th class="sorting text-center" tabindex="0">Delete</th>
            </thead>
            <tbody>
            @foreach($rows as $row)
                <tr role="row" class="odd">
                    <td class="sorting_1" tabindex="0">{{$row->id}}</td>
                    <td class="">{{$row->name}}</td>
                    <td class="">{{$row->guard_name}}</td>
                    <td class="">
                        @foreach($row->getPermissionNames() as $per)
                            <span class="badge bg-blue">{{$per}}</span>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{url(route('role.edit',$row->id))}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="{{url(route('role.destroy',$row->id))}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>

                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

    @endsection