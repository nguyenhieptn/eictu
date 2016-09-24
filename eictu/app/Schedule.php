<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   	public $timestamps = false;
    public $table = 'schedule';
    protected $fillable = [
        'id', 'student_id', 'studyprogram_id','situation'
    ];
}
