<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
    protected $table = "hoc_kies";

    protected $fillable = [
        'ten_hoc_ky',
        'nam_hoc'
    ];
     
    protected $guarded = [];
    
    public function chuongTrinhHoc()
    {
        return $this->hasMany('App\Models\ChuongTrinhHoc');
    }
}
