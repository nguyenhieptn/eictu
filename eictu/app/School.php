<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'password','type','username','email'
    ];
    public function manager()
    {
       return $this->belongsTo(User::class,'user_id','id');
        //laravel eloquen relationship
    }
}
