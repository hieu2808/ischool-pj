<!--Thừa kế layout master-->
@extends('layouts.master')

<!--Thêm section layout menu:sinh viên-->
@section('menu')
@include('menu.svmenu')
@endsection

@section('title', 'Bảng điểm sinh viên')
<!--Thêm section layout content-->
@section('content')
<h1 style="text-align: center;">Bảng điểm sinh viên</h1>

@if (!empty($classData))

     @foreach($classData as $cld) 
          <h3>Tên môn học: {{ $cld['monHoc']->ten_mon_hoc}}</h3>
          <table class="table table-bordered">
               <thead>
                    <tr>
                    <!--Lặp mảng tên điêm-> lấy ra danh sách tên điểm-->
                         @foreach($cld['tenDiem'] as $td)
                         <th>{{ $td->ten_diem}}</th>
                         @endforeach
                    </tr>
               </thead>
               <tbody>
                    <tr>
                         @foreach($cld['tenDiem'] as $td)
                         <td>
                              @if (!empty($scoreList[$td->lop_hoc_id][$td->id]))
                              {{ $scoreList[$td->lop_hoc_id][$td->id]->diem }}
                              @else
                              {{ 'Chưa có điểm' }}
                              @endif
                         </td>
                         @endforeach
                    </tr>
               </tbody>
          </table>
     @endforeach
    
@else
    Chưa có môn học đăng ký nào
@endif

@endsection
