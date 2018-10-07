<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $table = "students";
    protected $fillable = ['randomId', 'firstName', 'lastName', 'address', 'dob', 'student_image'];
}
