<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'gender','birthday', 'major_id'
    ];


    
    public function major()
    {
    	return $this->belongsTo('App\Major', 'major_id');
    }


    public function get_name(){
        return $this->name;
    }
}
