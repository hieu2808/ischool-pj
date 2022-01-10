<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\PhuongThucDanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PhuongThucDanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getEvaluation($lop_hoc_id)
    {
        if(!Gate::allows('onlyGV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        // lấy ra tên lớp học, tên môn học
        $class = LopHoc::find($lop_hoc_id);

        // Lấy ra danh sách phương thức đánh giá
        $evaluations = PhuongThucDanhGia::where('lop_hoc_id', $lop_hoc_id)->get();

        // tổng trọng số phương thức đánh giá
        $sum = PhuongThucDanhGia::where('lop_hoc_id', $lop_hoc_id)->sum('trong_so');

        return view('giaovien.phuongthucdanhgia', compact('class', 'evaluations', 'sum'));
    }

    public function postAddEvaluation(Request $request)
    {
        if(!Gate::allows('onlyGV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        PhuongThucDanhGia::create($request->all());

        return redirect()->route('getEvaluation', ['lop_hoc_id' => request()->lop_hoc_id]);
    }

    public function postDeleteEvaluation(Request $request)
    {
        if(!Gate::allows('onlyGV')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }
        
        PhuongThucDanhGia::find($request->id)->delete();

        return redirect()->route('getEvaluation', ['lop_hoc_id' => request()->lop_hoc_id]);
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
