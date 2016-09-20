<?php

namespace App\QLKTX;

use Illuminate\Database\Eloquent\Model;

class PhongKTX extends Model
{
    //
    protected $table = 'tbl_phong_ktx';
    protected $fillable = ['name', 'building_id'];
    public $timestamps = false;
}
