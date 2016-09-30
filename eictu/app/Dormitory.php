<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    protected $table = 'dormitories';
    protected $fillable = ['student_id','area_id', 'building', 'room', 'start_on', 'end_on'];
}
