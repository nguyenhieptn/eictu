<?php

namespace App\QLKTX;

use Illuminate\Database\Eloquent\Model;

class KhuNhaKTX extends Model
{
    //
    protected $table = 'tbl_khunha_ktx';
    protected $fillable = ['name'];
    public $timestamps = false;
}
