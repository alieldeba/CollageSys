<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['doctorOfSubject' , 'term'];

    public function scopeFilter($query , array $filters)
    {

        $query->when($filters['student_id'] ?? null , function($query , $filterSTR){
            $query->where(function($query) use ($filterSTR){
                $query->where('student_id' , $filterSTR);
            });
        });

        $query->when($filters['term'] ?? null , function($query , $filterSTR){
            $query->where(function($query) use ($filterSTR){
                $query->where('term_id' , $filterSTR);
            });
        });

        $query->when($filters['status'] ?? null , function($query , $filterSTR){
            $query->where(function($query) use ($filterSTR){
                $query->where('status' , $filterSTR);
            });
        });
        
    }

    public function doctorOfSubject()
    {
        return $this->belongsTo(DoctorOfSubject::class, 'doctor_of_subjects_id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
