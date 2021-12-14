<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.svmenu')
@endsection

<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Thông tin sinh viên</h1>
ID: {{  $thong_tin_svs->id  }} <br>
Họ và tên: {{ $thong_tin_svs->ten_ho." ".$thong_tin_svs->ten_dem." ".$thong_tin_svs->ten  }} <br>
Năm Sinh: {{  $thong_tin_svs->nam_sinh  }} <br>
Địa chỉ: {{  $thong_tin_svs->dia_chi  }} <br>
Số điện thoại: {{  $thong_tin_svs->tel  }} <br>
Tên lớp: {{  $thong_tin_svs->lop->ten_lop   }}

@endsection
