<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SVDangKyLopHoc extends Model
{
    protected $table = 's_v_dang_ky_lop_hocs';

    protected $fillable = [
        'sinh_vien_id',
        'lop_hoc_id',
        'ngay_dang_ky'
    ];  

    protected $guarded = [];

    public function lopHoc()
    {
        return $this->belongsTo('App\Models\LopHoc', 'lop_hoc_id');
    }

    public function sinhVien()
    {
        return $this->belongsTo('App\Models\SinhVien', 'sinh_vien_id');
    }
}
