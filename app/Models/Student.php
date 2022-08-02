<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $with = ['termStudent'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spec()
    {
        return $this->belongsTo(Specialize::class , 'specialize');
    }

    public function termStudent(){
        return $this->hasMany(TermStudens::class , 'student_id');
    }

    public function requests(){
        return $this->hasMany(StudentRequest::class , 'student_id');
    }
}
