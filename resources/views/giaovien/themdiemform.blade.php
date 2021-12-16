<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.gvmenu')
@endsection

@section('title', 'Thêm điểm sinh viên')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Thêm điểm sinh viên</h1>

<form action="" method="post">
    <table class="table table-bordered">
        <thead>
            <tr>
                
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</form>

@endsection
