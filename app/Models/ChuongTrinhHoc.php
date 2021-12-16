<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChuongTrinhHoc extends Model
{
    protected $table = "chuong_trinh_hocs";

    protected $fillable = [
        'hoc_ky_id',
        'ten_chuong_trinh_hoc',
        'ghi_chu'
    ];
     
    protected $guarded = [];
    
    public function hocKy()
    {
        return $this->belongsTo('App\Models\HocKy', 'hoc_ky_id');
    }

    public function lopHoc()
    {
        return $this->hasMany('App\Models\LopHoc');
    }
}
