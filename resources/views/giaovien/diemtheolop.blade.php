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
<a class="btn btn-success" href="{{ route('getAddScore', ['lop_hoc_id' => request()->lop_hoc_id]) }}">Cập nhật điểm</a>

<h3>Tên lớp học: {{ $class->ten_lop_hoc }} </h3>

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
                    @if (!empty($scoreList[$sv->sinhVien->id][$score->id]))
                    {{ $scoreList[$sv->sinhVien->id][$score->id]->diem }}
                    @else
                        {{ '' }}
                    @endif
                </td>
                @endforeach
            </tr>
        @endforeach       
    </tbody>
</table>
@endsection
