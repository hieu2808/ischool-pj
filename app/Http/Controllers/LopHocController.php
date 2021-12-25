<?php

namespace App\Http\Controllers;

use App\Models\DiemMonHoc;
use App\Models\LopHoc;
use App\Models\PhuongThucDanhGia;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use App\Models\SVDangKyLopHoc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LopHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function XemDiem()
    {
        $id = Auth::user()->profile_id;

        if(!Gate::allows('onlySV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $data = [];
        //TODO: Liệt kê bảng điểm theo môn học của sinh viên có id là sinh viên $id
        $mon_hoc_da_dang_ky = SVDangKyLopHoc::where('sinh_vien_id', $id)->get();
        foreach($mon_hoc_da_dang_ky as $mon_hoc) {
            $lop_hoc = $mon_hoc->lopHoc;
            $data[$lop_hoc->id]['mon_hoc'] = $lop_hoc->monHoc;
            $data[$lop_hoc->id]['ten_diem'] = $lop_hoc->phuongThucDG;
            $data[$lop_hoc->id]['diem'] = $lop_hoc->diemMH;
        }
        // $diem_so = DiemMonHoc::find($id)->lopHoc()->get();

        // $mon_hoc_da_dang_ky = SVDangKyLopHoc::where('sinh_vien_id', $id)->get();
        // foreach($mon_hoc_da_dang_ky as $mon_hoc) {
        //     $lop_hoc_id = $mon_hoc->lop_hoc_id;
        //     //$lop_hoc = LopHoc::where('id', $lop_hoc_id)->get();
        //     $ten_diem = PhuongThucDanhGia::where('lop_hoc_id', $lop_hoc_id)->get();
        //     foreach($ten_diem as $diem) {
        //         $diem_so[] = DiemMonHoc::where([['lop_hoc_id', $lop_hoc_id], ['phuong_thuc_danh_gia_id', $diem->id], ['sinh_vien_id', $id]])->get();
        //     }
        // }

        //  var_dump($mon_hoc_da_dang_ky);
          
        //  var_dump($diem_so);

        return view('sinhvien.index', compact('data', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
