<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.svmenu')
@endsection

@section('title', 'Danh sách môn học đăng ký')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Danh sách môn học</h1>

{{ $currenttime }} <br>

{{-- @dd($course_registration) --}}
<table class="table table-bordered">
    <thead>
        <tr>
            <td>ID lớp học</td>
            <td>Tên lớp học</td>
            <td>Tên môn học</td>
            <td>Tên ngành học</td>
            <td>Khoa</td>
            <td>Số lượng sinh viên</td>
            <td>Số tín chỉ</td>
            <td>Ngày bắt đầu</td>
            <td>Ngày kết thúc</td>
            <td>Đăng Ký</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($classes as $cl)
            <tr>
                <td>{{   $cl->id   }}</td>
                <td>{{   $cl->ten_lop_hoc   }} </td>
                <td>{{   $cl->monHoc->ten_mon_hoc   }} </td>
                <td>{{   $cl->monHoc->nganh->ten_nganh   }} </td>
                <td>{{   $cl->monHoc->nganh->khoa->ten_khoa   }} </td>
                <td>{{   $cl->so_luong_sv  }} </td>
                <td>{{   $cl->so_tin_chi  }} </td>
                <td>{{   $cl->ngay_bat_dau  }} </td>
                <td>{{   $cl->ngay_ket_thuc  }} </td>
                <form action="{{ route('postCourseRegistration') }}" method="post">
                    @csrf
                    <input type="hidden" name="lop_hoc_id" value="{{ $cl->id }}">
                    <td><button class="btn btn-success">Đăng ký</button></td>
                </form>
                
            </tr>
        @endforeach
    </tbody>
</table>



@endsection
