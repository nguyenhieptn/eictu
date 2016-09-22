<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $table = 'students';
    /**
     * The attributes that are mass assignable.
     * Iwant sua cai nay vao... nay thay sai cac ban lam lai nhe
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'gender','birthday', 'major_id', 'class_id', 'school_id'
    ];






    // Khang sua comment cai nay nhe... nhin ngu von
    // public $timestamps=false;
    // public $table='tbl_SinhVien';


/**
* Nhom Iwant
**/
    public function iwants()
    {
        return $this->hasMany('App\IWant', 'student_id');
    }
}
