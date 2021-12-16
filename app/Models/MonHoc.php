<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = "mon_hocs";

    protected $fillable = [
        'nganh_id',
        'ten_mon_hoc'
    ];  
        
    protected $guarded = [];
    
    public function nganh()
    {
        return $this->belongsTo('App\Models\Nganh', 'nganh_id');
    }

    public function lopHoc() {
        return $this->hasMany('App\Models\LopHoc');
    }
}
