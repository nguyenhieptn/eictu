<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    //Coding by Kakarot
    public $timestamps = false;

    public function manager()
    {
        return $this->belongsTo(Classes::class,'id','major_id');
        //laravel eloquen relationship
    }

    /// end coding by kakarot


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
