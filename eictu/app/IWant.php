<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IWant extends Model
{
	protected $table = 'wants';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body'
    ];

    public function student()
    {
    	return $this->belongsTo('App\Student', 'student_id');
    }
}
