<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.gvmenu')
@endsection

@section('title', 'Danh sách lớp học giáo viên giảng dạy')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Danh sách lớp học giáo viên giảng dạy</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID môn học</th>
            <th>Tên môn học</th>
            <th>Ngành</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mhs as $mh)
        <tr>
        <td><a href="{{ route('getClassGV', ['mon_hoc_id' => $mh->id]) }}">{{   $mh->id   }}</a></td>
        <td>{{   $mh->ten_mon_hoc   }}</td>
        <td>{{   $mh->nganh->ten_nganh   }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
