<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    protected $table = "khoa_hocs";

    protected $fillable = [
        'ma_khoa_hoc',
        'ten_khoa_hoc'
    ];  
        
    protected $guarded = [];
    
    public function lop()
    {
        return $this->hasMany('App\Models\Lop');
    }
}
