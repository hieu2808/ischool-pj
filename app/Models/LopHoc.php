<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    protected $table = "lop_hocs";

    protected $fillable = [
        'mon_hoc_id',
        'chuong_trinh_hoc_id',
        'ten_lop_hoc',
        'so_luong_sv',
        'so_tin_chi',
        'ngay_bat_dau',
        'ngay_ket_thuc'
    ];  
        
    protected $guarded = [];
    
    public function phuongThucDG()
    {
        return $this->hasMany('App\Models\PhuongThucDanhGia');
    }

    public function diemMH()
    {
        return $this->hasMany('App\Models\DiemMonHoc');
    }

    public function sinhVienDK()
    {
        return $this->hasMany('App\Models\SVDangKyLopHoc');
    }

    public function phanLopGV()
    {
        return $this->hasMany('App\Models\PhanLopGV');
    }

    public function monHoc()
    {
        return $this->belongsTo('App\Models\MonHoc', 'mon_hoc_id');
    }

    public function chuongTrinhHoc()
    {
        return $this->belongsTo('App\Models\ChuongTrinhHoc', 'chuong_trinh_hoc_id');
    }
}
