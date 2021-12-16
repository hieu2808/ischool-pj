<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuongThucDanhGia extends Model
{
    protected $table = "phuong_thuc_danh_gias";

    protected $fillable = [
        'lop_hoc_id',
        'ten_diem',
        'trong_so'
    ];  
        
    protected $guarded = [];

    public function lopHoc()
    {
        return $this->belongsTo('App\Models\LopHoc', 'lop_hoc_id');
    }

    public function diemMH()
    {
        return $this->hasMany('App\Models\DiemMonHoc');
    }
}
