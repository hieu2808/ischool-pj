<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.adminmenu')
@endsection

@section('title', 'Danh sách lớp học')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center; margin-bottom: 20px">Danh sách lớp học</h1>

<h4>Tên môn học: @foreach ($classes as $class) {{$class->monHoc->ten_mon_hoc}}@endforeach</h4>

<div class="d-flex justify-content-end" style="margin-bottom: 20px">
    <a href="{{ route('create_class', ['mon_hoc_id' => request()->id]) }}" class="btn btn-primary">Thêm lớp học</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>ID lớp học</td>
            <td>Tên lớp học</td>
            <td>Tên chương trình học</td>
            <td>Số lượng sinh viên</td>
            <td>Số tín chỉ</td>
            <td>Ngày bắt đầu</td>
            <td>Ngày kết thúc</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($classes as $class)
            <tr>
                <td>{{   $class->id   }}</td>
                <td>{{   $class->ten_lop_hoc   }}</td>
                <td>{{   $class->chuongTrinhHoc->ten_chuong_trinh_hoc   }}</td>
                <td>{{   $class->so_luong_sv   }}</td>
                <td>{{   $class->so_tin_chi   }}</td>
                <td>{{   $class->ngay_bat_dau   }}</td>
                <td>{{   $class->ngay_ket_thuc   }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
