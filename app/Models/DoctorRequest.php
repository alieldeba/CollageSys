<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorRequest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['doctor' , 'term', 'subject'];



    public function scopeFilter($query, array $filters){
        
        $query->when($filters['subject'] ?? null, function ($query, $searchStr) {

            $query
                ->where(function ($query) use ($searchStr) {
                    $query
                        ->where('subject_id' , $searchStr);
                });
        });

        $query->when($filters['status'] ?? null, function ($query, $searchStr) {

            $query
                ->where(function ($query) use ($searchStr) {
                    $query
                        ->where('status' , $searchStr);
                });
        });

    }


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
