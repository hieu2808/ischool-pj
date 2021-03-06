<?php

namespace App\Http\Controllers;

use App\Models\DiemMonHoc;
use App\Models\GiaoVien;
use App\Models\Lop;
use App\Models\LopHoc;
use App\Models\PhanLopGiaoVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class GiaoVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('onlyGV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $id = Auth::user()->profile_id;

        $teachers = GiaoVien::where('id', $id)->get();
        foreach($teachers as $teacher) {
            // Lấy thông tin giáo viên(Collection)
            $infotcs = $teacher->where('id', $id)->get();
            // Lấy thông tin Khoa theo giáo viên(Collection)
            $khoas = $teacher->khoa->where('id', $teacher->khoa_id)->get();
        }
        return view('giaovien.index', compact('infotcs', 'khoas'));
    }

    //Lấy danh sách môn học theo giáo viên
    public function getSubjectByTeacher()
    {
        if(!Gate::allows('onlyGV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $id = Auth::user()->profile_id;

        $teachers = PhanLopGiaoVien::where('giao_vien_id', $id)->get();
        foreach($teachers as $teacher) {
            $lop_hoc = $teacher->lopHoc;
            $mhs = $lop_hoc->monHoc->where('id', $lop_hoc->mon_hoc_id)->get();
        }
        return view('giaovien.themdiemmh', compact('mhs'));
    }

    //Lấy danh sách lớp học theo môn học
    public function getClassListBySubject($mon_hoc_id)
    {
        if(!Gate::allows('onlyGV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $lists = LopHoc::where('mon_hoc_id', $mon_hoc_id)->get();

        return view('giaovien.loptheomon', compact('lists'));
    }


    //Lấy danh sách điểm sinh viên theo lớp học
    public function getScoreListByClass($lop_hoc_id)
    {
        if(!Gate::allows('onlyGV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }
        
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
        // dd($scoreList);

        return view('giaovien.diemtheolop', compact('studentList', 'nameScoreList', 'scoreList', 'class'));
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
