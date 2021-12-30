<?php

namespace App\Http\Controllers;

use App\Models\DiemMonHoc;
use App\Models\LopHoc;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiemMonHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAddScores($lop_hoc_id)
    {
        $class = LopHoc::with('sinhVienDK', 'phuongThucDG', 'diemMH')->find($lop_hoc_id);

        $studentList = $class->sinhVienDK;

        $nameScoreList = $class->phuongThucDG;

        $scoreList = [];

        foreach($studentList as $stdl) {
            foreach($nameScoreList as $nscl) {

                $score = DiemMonHoc::where([['sinh_vien_id', $stdl->sinh_vien_id], 
                                            ['phuong_thuc_danh_gia_id', $nscl->id],
                                            ['lop_hoc_id', $nscl->lop_hoc_id]
                                        ])->first();
                                        
                $scoreList[$stdl->sinh_vien_id][$nscl->id] = $score;
            }
        }

        return view('giaovien.themdiemform', compact('studentList', 'nameScoreList', 'scoreList', 'class'));
    }
    
    public function postAddScores($lop_hoc_id, Request $request)
    {
        $giao_vien_id = Auth::user()->profile_id;

        $ngay_cho_diem = Carbon::now('Asia/Ho_Chi_Minh');

        $data = $request->diem;
        
        foreach($data as $studentID => $scoreType) {
            foreach($scoreType as $scoreTypeID => $score) {
                DiemMonHoc::updateOrCreate(['id' => $score['diem_id'] ?? null], [
                    'sinh_vien_id' => $studentID,
                    'lop_hoc_id' => $lop_hoc_id,
                    'phuong_thuc_danh_gia_id' => $scoreTypeID,
                    'giao_vien_id' => $giao_vien_id,
                    'diem' => $score['diem'] ?? null,
                    'ngay_cho_diem' => $ngay_cho_diem
                ]);
            }
        }
        // $keyName = array_keys($data);
        // dd($data);
        
        return redirect()->route('getAddScore', ['lop_hoc_id' => request()->lop_hoc_id]);
    }
    public function index()
    {
        //
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
