<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['stud_id','age','grade_level'];

    public function students_name()
    {
        return $this->belongsTo('App\StudentName');
    }
}


