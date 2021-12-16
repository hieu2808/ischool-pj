<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'sinh_viens';

    protected $fillable = [
        'lop_id',
        'ten_ho',
        'ten_dem',
        'ten',
        'nam_sinh',
        'dia_chi',
        'tel'
    ];  

    protected $guarded = [];
  
    public function user() 
    { 
        return $this->morphOne('App\User', 'profile');
    }

    public function diemMH()
    {
        return $this->hasMany('App\Models\DiemMonHoc');
    }

    public function lop()
    {
        return $this->belongsTo('App\Models\Lop', 'lop_id');
    }
}
