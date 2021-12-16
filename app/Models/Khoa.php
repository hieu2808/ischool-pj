<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = "khoas";

    protected $fillable = [
        'ten_khoa'
    ];
     
    protected $guarded = [];
    
    public function nganh()
    {
        return $this->hasMany('App\Models\Nganh');
    }

    public function giaoVien()
    {
        return $this->hasMany('App\Models\GiaoVien');
    }
}
