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

        //Lấy môn học sinh viên đã đăng ký
        $subjectRegisted = SVDangKyLopHoc::where('sinh_vien_id', $id)->get();

        $scoreList = [];

        foreach($subjectRegisted as $sr) {
            $class = $sr->lopHoc;
            $classData[$sr->lop_hoc_id]['monHoc'] = $class->monHoc;
            $classData[$sr->lop_hoc_id]['tenDiem'] = $class->phuongThucDG;

            foreach($classData[$sr->lop_hoc_id]['tenDiem'] as $d) {

                $score = DiemMonHoc::where([['sinh_vien_id', $id], 
                                            ['phuong_thuc_danh_gia_id', $d->id],
                                            ['lop_hoc_id', $d->lop_hoc_id]
                                        ])->first();
                                        
                $scoreList[$d->lop_hoc_id][$d->id] = $score;
            }
        }

        return view('sinhvien.index', compact('classData', 'scoreList'));
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
