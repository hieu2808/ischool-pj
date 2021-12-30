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

<h3>Tên lớp học: {{ $class->ten_lop_hoc }} </h3>

<form action="{{ route('postAddScore', ['lop_hoc_id' => request()->lop_hoc_id]) }}" method="post">
    @csrf
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên sinh viên</th>
                @foreach ($nameScoreList as $dg)
                    <td>{{ $dg->ten_diem.' '.$dg->id }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $sv)
                <tr>
                    <td>{{ $sv->sinhVien->ten_ho.' '.$sv->sinhVien->ten_dem.' '.$sv->sinhVien->ten.' '.$sv->sinhVien->id }}</td>
                    
                    @foreach ($nameScoreList as $score)
                    <td>
                        {{-- <input type="hidden" name="sinh_vien_id[]" value="{{ $sv->sinhVien->id }}"> --}}
                        {{-- <input type="hidden" name="phuong_thuc_danh_gia_id[]" value="{{ $score->id }}"> --}}
                        @if (!empty($scoreList[$sv->sinhVien->id][$score->id]))
                            <input type="hidden" name="diem[{{$sv->sinhVien->id }}][{{ $score->id }}][diem_id]" class="form-control" value="{{ $scoreList[$sv->sinhVien->id][$score->id]->id }}"> 
                            <input type="text" name="diem[{{$sv->sinhVien->id }}][{{ $score->id }}][diem]" class="form-control" placeholder="Nhap diem" value="{{ $scoreList[$sv->sinhVien->id][$score->id]->diem }}">
                        @else
                        <input type="number" name="diem[{{$sv->sinhVien->id }}][{{ $score->id }}][diem]" class="form-control" placeholder="Nhap diem" >
                        @endif
                    </td>
                    @endforeach
                </tr>
            @endforeach       
        </tbody>
    </table>
</form>
@endsection
