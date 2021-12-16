<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanLopGiaoVien extends Model
{
    protected $table = 'phan_lop_giao_viens';

    protected $fillable = [
        'giao_vien_id',
        'lop_hoc_id',
        'ngay_phan_lop'
    ];  
        
    protected $guarded = [];

    public function lopHoc()
    {
        return $this->belongsTo('App\Models\LopHoc', 'lop_hoc_id');
    }

    public function giaoVien()
    {
        return $this->belongsTo('App\Models\GiaoVien', 'giao_vien_id');
    }
}
