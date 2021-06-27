<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
        'ten_sp', 'solg_sp', 'gia_goc','gia_sale','trang_thai','chiet_khau','mo_ta','ma_dm '
    ];
    protected $primaryKey = 'ma_sp';
    protected $table = 'san_pham';

    public function binh_luan(){
        return $this->hasMany('App\Models\binh_luan');
    }
}
