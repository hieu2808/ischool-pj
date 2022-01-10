<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\ChuongTrinhHoc;
use App\Models\LopHoc;
use App\Models\MonHoc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('onlyAD')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $id = Auth::user()->profile_id;

        $admin = AdminProfile::find($id);

        return view('admin.index', compact('admin'));
    }

    public function getMonHoc()
    {
        if(!Gate::allows('onlyAD')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $monhoc = MonHoc::paginate(10);

        return view('admin.quanlylh', compact('monhoc'));
    }

    public function getClassBySubject($mon_hoc_id)
    {
        if(!Gate::allows('onlyAD')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $classes = LopHoc::with('monHoc', 'chuongTrinhHoc', 'phanLopGV')->where('mon_hoc_id', $mon_hoc_id)->get();

        return view('admin.classbysubject', compact('classes'));
    }

    public function addClassForm()
    {
        if(!Gate::allows('onlyAD')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }

        $chuongTrinhHocs = ChuongTrinhHoc::all();

        return view('admin.addclassform', compact('chuongTrinhHocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mon_hoc_id)
    {
        if(!Gate::allows('onlyAD')) {
            echo 'Rất tiếc bạn ko có quyền truy cập';
            die();
        }
        
        $data = array_merge(['mon_hoc_id' => $mon_hoc_id], request()->all());
        // dd($data);
        LopHoc::create($data);

        return redirect()->route('getClassList', ['mon_hoc_id' => $mon_hoc_id]);
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
