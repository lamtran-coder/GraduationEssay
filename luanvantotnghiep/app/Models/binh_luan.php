<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class binh_luan extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'comment', 'comment_name', 'comment_date','comment_product_id','comment_parent_comment','comment_status'
    ];
    protected $primaryKey = 'comment_id';
    protected $table = 'binh_luan';

    public function san_pham(){
        return $this->belongsTo('App\Models\Product','comment_product_id');
    }

}
