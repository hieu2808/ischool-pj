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

<!--Lặp mảng $data- danh sách gồm tên môn học, tên điểm, điểm số-->
@foreach($data as $d) 
     <h3>Tên môn học: {{ $d['mon_hoc']->ten_mon_hoc}}</h3>
     <table class="table table-bordered">
          <thead>
               <tr>
               <!--Lặp mảng tên điêm-> lấy ra danh sách tên điểm-->
                    @foreach($d['ten_diem'] as $ten_diem)
                    <th>{{ $ten_diem->ten_diem}}</th>
                    @endforeach
               </tr>
          </thead>
          <tbody>
               <tr>
               <!--Lặp mảng điểm-> lấy ra danh sách điểm số-->
                    @foreach($d['diem'] as $diem)
                    <td>{{ $diem->diem}}</td>
                    @endforeach
               </tr>
          </tbody>
     </table>
@endforeach
@endsection
