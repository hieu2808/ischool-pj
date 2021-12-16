<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.gvmenu')
@endsection

@section('title', 'Thông tin giáo viên')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Thông tin giáo viên</h1>
@foreach($infotcs as $info) 
ID giáo viên: {{   $info->id   }} <br>
Tên giáo viên: {{   $info->ten_ho." ".$info->ten_dem." ".$info->ten   }} <br>
Năm sinh giáo viên: {{   $info->nam_sinh   }} <br>
Địa chỉ giáo viên: {{   $info->dia_chi   }} <br>
Số điện thoại giáo viên: {{   $info->tel   }} <br>
@foreach($khoas as $khoa)
Khoa: {{   $khoa->ten_khoa   }}
@endforeach
@endforeach
@endsection
