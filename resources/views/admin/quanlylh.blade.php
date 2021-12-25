<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.adminmenu')
@endsection

@section('title', 'Quản lý lớp học')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Danh sách môn học</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>ID môn học</td>
            <td>Tên môn học</td>
            <td>Tên ngành học</td>
            <td>Tên khoa</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($monhoc as $mh)
            <tr>
                <td><a href="{{ route('getClassList', ['mon_hoc_id' => $mh->id]) }}">{{   $mh->id   }}</a></td>
                <td>{{   $mh->ten_mon_hoc   }} </td>
                <td>{{   $mh->nganh->ten_nganh   }} </td>
                <td>{{   $mh->nganh->khoa->ten_khoa   }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $monhoc->links() }}


@endsection
