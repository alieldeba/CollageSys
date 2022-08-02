<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermStudens extends Model
{
    use HasFactory;

    protected $With = ['doctor_of_subject' , 'term' , 'student'];

    public function scopeFilter($query , array $filters)
    {
        $query->when($filters['term'] ?? null, function ($query, $searchStr) {

            $query
                ->where(function ($query) use ($searchStr) {
                    $query
                        ->where('term_id' , $searchStr);
                });
        });

        $query->when($filters['student_id'] ?? null, function ($query, $searchStr) {

            $query
                ->where(function ($query) use ($searchStr) {
                    $query
                        ->where('student_id' , $searchStr);
                });
        });
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function doctor_of_subject()
    {
        return $this->belongsTo(DoctorOfSubject::class);
    }
}
