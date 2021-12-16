<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.gvmenu')
@endsection

@section('title', 'Danh sách điểm sinh viên theo lớp học')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Danh sách điểm sinh viên theo lớp học</h1>
<a class="btn btn-success" href="{{ url()->previous() }}">Back</a>

<h3>Tên lớp học: @foreach ($lhlists as $l){{   $l->ten_lop_hoc   }} @endforeach</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên sinh viên</th>
            @foreach ($ten_diems as $ten)
                    <th>{{   $ten->ten_diem   }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($svs as $sv)
            <tr>
                <td><a href="#">{{   $sv->sinhVien->ten_ho." ".$sv->sinhVien->ten_dem." ".$sv->sinhVien->ten   }}</a></td>
                @foreach ($diemsos as $diem)
                    <td>{{   $diem->diem   }}</td>
                @endforeach
            </tr>
        @endforeach
        
    </tbody>
</table>
@endsection
