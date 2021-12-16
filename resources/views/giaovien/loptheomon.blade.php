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
<a class="btn btn-success" href="{{ url()->previous() }}">Back</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID lớp học</th>
            <th>Tên lớp học</th>
            <th>Tên môn học</th>
            <th>Số TC</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lists as $list)
            <tr>
                <td><a href="{{url('/giaovien/diemtheolop/'.$list->id)}}">
                    {{   $list->id   }}
                </a></td>
                <td>{{   $list->ten_lop_hoc   }}</td>
                <td>{{   $list->monHoc->ten_mon_hoc   }}</td>
                <td>{{   $list->so_tin_chi   }}</td>
                <td>{{   $list->ngay_bat_dau   }}</td>
                <td>{{   $list->ngay_ket_thuc   }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
