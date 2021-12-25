<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.gvmenu')
@endsection

@section('title', 'Thêm phương thức đánh giá')
<!--Thêm section layout content-->
@section('content')

<h1>Tên môn học: {{ $class->monHoc->ten_mon_hoc }}</h1>
<h1>Tên lớp học: {{ $class->ten_lop_hoc }}</h1>

{{-- Thêm phương thức đánh giá --}}
<h3 style="text-align: center; margin-bottom: 20px">Thêm phương thức đánh giá</h3>

<form action="{{ route('postAddEvaluation') }}" method="post">
    @csrf

    <div class="form-row">
        <input type="hidden" name='lop_hoc_id' value="{{ request()->lop_hoc_id }}">
    </div>

    <div class="form-row">
        <label for="tendiem" class="col-2">Tên điểm</label>
        <input type="text" class=" col-10 form-control" name='ten_diem' id="tendiem">
    </div>

    <div class="form-row">
        <label for="trongSo" class="col-2">Trọng số</label>
        <input type="number" step="0.01" class="col-10 form-control" name='trong_so' id="trongSo">
    </div>
    
    <button type="submit" class="btn btn-success" >Thêm mới</button>

</form>

{{-- Hiển thị bảng phương thức đánh giá --}}
<table class="table table-bordered" style="margin-top: 10px">
    <thead>
        <tr>
            <th>Tên điểm</th>
            <th>Trọng số</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($evaluations as $evlt)
            <tr>
                <td>{{ $evlt->ten_diem }}</td>
                <td>{{ $evlt->trong_so }}</td>
                <td>
                    <form action="{{ route('postDeleteEvaluation') }}" method="post">
                        @csrf

                        <input type="hidden" name="lop_hoc_id" value="{{ request()->lop_hoc_id }}">
                        <input type="hidden" name="id" value="{{ $evlt->id }}">
                        <button type="submit" class="btn btn-success" >Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>Tổng</td>
            <td>{{ $sum }}</td>
        </tr>
    </tbody>
</table>

@endsection