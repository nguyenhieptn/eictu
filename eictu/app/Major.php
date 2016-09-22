<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{


	// Nhom TEACher
    public function teacher()
    {
    	return $this->hasMany('App\Teacher', 'major_id');
    }
}
