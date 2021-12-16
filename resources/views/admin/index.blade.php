<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.adminmenu')
@endsection

@section('title', 'Thông tin Admin')
<!--Thêm section layout content-->
@section('content')
<h1>Thông tin Admin</h1>
Tên Admin: {{$admin->name}}
@endsection
