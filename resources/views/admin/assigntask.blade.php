<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.adminmenu')
@endsection

@section('title', 'Giao nhiệm vụ')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center; margin-bottom: 20px">Giao nhiệm vụ</h1>

{{-- @dd(request()->all()) --}}
<form action="{{ route('assign_task', ['lop_hoc_id' => request()->lop_hoc_id]) }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="lop_hoc_id" class="form-label">Tên lớp học: {{ $assign->ten_lop_hoc }}</label>
        <input type="hidden" class="form-control" name='lop_hoc_id' id="lop_hoc_id" value="{{ $assign->id }}">
    </div>
    <div class="mb-3">
        <label for="tenGV" class="form-label">Tên Giáo Viên</label>
        <select name="giao_vien_id" class="form-select" id="tenGV" required>
            <option selected value="">Chọn tên giáo viên</option>
            @foreach ($teacher as $t)
                <option value="{{ $t->id }}">{{ $t->ten_ho . " " . $t->ten_dem . " " . $t->ten}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="ngay_phan_lop" class="form-label">Ngày phân lớp</label>
        <input type="date" class="form-control" name='ngay_phan_lop' id="ngay_phan_lop">
    </div>
    <button type="submit" class="btn btn-success" >Giao nhiệm vụ</button>

</form>

@endsection
