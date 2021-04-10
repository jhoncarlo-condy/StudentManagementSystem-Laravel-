<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentName extends Model
{
    protected $table = 'students_name';
    protected $fillable = ['FirstName','LastName','MiddleName'];

    // public function student()
    // {
    //     return $this->hasOne('App\Student');
    // }
}
