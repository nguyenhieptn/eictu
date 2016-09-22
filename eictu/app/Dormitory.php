<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    //
    protected $table = 'dormirories';
    protected $fillable = ['student_id', 'school_id', 'building', 'room', 'start_on', 'end_on'];
}
