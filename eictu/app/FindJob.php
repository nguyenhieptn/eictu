<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FindJob extends Model
{
    protected $table = "searchjobs";
    protected $fillable = ['id','content','student_id'];
    public $timestamps = true;

}
