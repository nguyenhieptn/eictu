<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
	protected $table = 'majors';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name'
    ];

	// Nhom TEACher
    public function teacher()
    {
    	return $this->hasMany('App\Teacher', 'major_id');
    }

    public function get_name(){
        return $this->name;
    }
}
