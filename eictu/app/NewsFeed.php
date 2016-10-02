<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
  
    public $table='newsfeed';
    public $fillable = ['content','student_id','type'];
    public $timestamps=false;

}
