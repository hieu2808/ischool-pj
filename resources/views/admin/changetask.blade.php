<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.adminmenu')
@endsection

@section('title', 'Thay đổi nhiệm vụ')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center; margin-bottom: 20px">Thay đổi nhiệm vụ</h1>

{{-- @dd(request()->all()) --}}
<form action="{{ route('postChangeTask', ['lop_hoc_id' => request()->lop_hoc_id]) }}" method="post">
    @csrf

    {{-- @dd(request()->all()) --}}
    {{-- Hiển thị tên lớp học --}} 
    <div class="mb-3">
        <label for="phan_lop_id" class="form-label">Tên lớp học: {{ $assigntask->lopHoc->ten_lop_hoc }}</label>
    </div>

    <div class="mb-3">
        <input type="hidden" class="form-control" name='id' value="{{ $assigntask->id }}">
        <input type="hidden" class="form-control" name='lop_hoc_id' value="{{ $assigntask->lop_hoc_id }}">
        <input type="hidden" class="form-control" name='ngay_phan_lop' value="{{ $assigntask->ngay_phan_lop }}">
    </div>
    
    <div class="mb-3">
        <label for="tenGV" class="form-label">Tên Giáo Viên</label>
        <select name="giao_vien_id" class="form-select" id="tenGV" required>

            {{-- Hiển thị tên giáo viên cũ --}} 
            <option selected value="{{ $assigntask->giao_vien_id }}">
                {{ $assigntask->giaoVien->ten_ho . " " . $assigntask->giaoVien->ten_dem . " " . $assigntask->giaoVien->ten. " - " . $assigntask->giao_vien_id . " (Hiện tại)"}}
            </option>

            {{-- Hiển thị tên giáo viên mới --}} 
            @foreach ($teachers as $t)
                <option value="{{ $t->id }}">
                    {{ $t->ten_ho . " " . $t->ten_dem . " " . $t->ten. " - " . $t->id}}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success" >Giao nhiệm vụ</button>

</form>
@endsection
