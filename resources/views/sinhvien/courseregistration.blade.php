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

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID lớp học</th>
            <th>Tên lớp học</th>
            <th>Tên môn học</th>
            <th>Tên ngành học</th>
            <th>Khoa</th>
            <th>Số lượng sinh viên</th>
            <th>Số tín chỉ</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Đăng Ký</th>
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
                {{-- @dd($cl->sinh_vien_d_k_count, $cl->so_luong_sv) --}}
                @if (in_array($id, $cl->sinhVienDK->pluck('sinh_vien_id')->toArray()))
                    <td>{{ 'Đã đăng ký' }}</td>
                @elseif($cl->sinh_vien_d_k_count < $cl->so_luong_sv)
                <form action="{{ route('postCourseRegistration') }}" method="post">
                        @csrf
                        <input type="hidden" name="lop_hoc_id" value="{{ $cl->id }}">
                        <td><button class="btn btn-success">Đăng ký</button></td>
                    </form>
                @else
                <td>{{ 'Lớp đã đầy' }}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<h1 style="text-align: center;">Danh sách môn học đã đăng ký</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID lớp học</th>
            <th>Tên lớp học</th>
            <th>Tên môn học</th>
            <th>Tên chương trình học</th>
            <th>Ngày đăng ký</th>
        </tr>
    </thead>

    <tbody>
       @foreach ($registedCourse as $rc)
           <tr>
               <td>{{$rc->lopHoc->id}}</td>
               <td>{{$rc->lopHoc->ten_lop_hoc}}</td>
               <td>{{$rc->lopHoc->monHoc->ten_mon_hoc}}</td>
               <td>{{$rc->lopHoc->chuongTrinhHoc->ten_chuong_trinh_hoc}}</td>
               <td>{{$rc->ngay_dang_ky}}</td>
           </tr>
       @endforeach
    </tbody>
</table>
@endsection
