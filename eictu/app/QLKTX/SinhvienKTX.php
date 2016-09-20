<?php

namespace App\QLKTX;

use Illuminate\Database\Eloquent\Model;

class SinhvienKTX extends Model
{
    //
    protected $table = 'tbl_sinhvien_ktx';
    protected $fillable = ['student_id', 'room_id'];
    public $timestamps = false;
}
