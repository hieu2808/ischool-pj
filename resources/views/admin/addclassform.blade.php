<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.adminmenu')
@endsection

@section('title', 'Thêm lớp học')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center; margin-bottom: 20px">Thêm lớp học</h1>

<form action="{{ route('postCreateClass', ['mon_hoc_id' => request()->mon_hoc_id]) }}" method="post">
    @csrf
    
    <div class="mb-3">
        <label for="tenChuongTrinhHoc" class="form-label">Tên chương trình học</label>
        <select name="chuong_trinh_hoc_id" id="" class="form-select" id="tenChuongTrinhHoc" required>
            <option selected value="">Chọn tên chương trình học</option>
            @foreach ($chuongTrinhHocs as $cth)
                <option value="{{ $cth->id }}">{{ $cth->ten_chuong_trinh_hoc }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="tenLopHoc" class="form-label">Tên lớp học</label>
        <input type="text" class="form-control" name='ten_lop_hoc' id="tenLopHoc">
    </div>
    <div class="mb-3">
        <label for="soLuongSV" class="form-label">Số lượng sinh viên</label>
        <input type="number" name='so_luong_sv' class="form-control" id="soLuongSV">
    </div>
    <div class="mb-3">
        <label for="soTinChi" class="form-label">Số tín chỉ</label>
        <input type="number" name='so_tin_chi' class="form-control" id="soTinChi">
    </div>
    <div class="mb-3">
        <label for="ngayDangKy" class="form-label">Ngày đăng ký</label>
        <input type="date" name='ngay_bat_dau' class="form-control" id="ngayDangKy">
    </div>
    <div class="mb-3">
        <label for="ngayKetThuc" class="form-label">Ngày kết thúc</label>
        <input type="date" name='ngay_ket_thuc' class="form-control" id="ngayKetThuc">
    </div>

    <button type="submit" class="btn btn-success" >Thêm mới</button>

</form>

@endsection
