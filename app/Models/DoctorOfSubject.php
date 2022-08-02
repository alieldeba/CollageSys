<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorOfSubject extends Model
{
    use HasFactory;

    protected $table = 'doctor_of_subjects';

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
