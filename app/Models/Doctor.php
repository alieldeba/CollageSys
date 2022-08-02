<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;

    protected $with = ['spec'];

    protected $guarded = ['id'];

    public function scopeFilter($query , array $filters)
    {
        
        $query->when($filters['spec'] ?? null, function ($query, $searchStr) {

            $query
                ->where(function ($query) use ($searchStr) {
                    $query
                        ->where('specialize' , $searchStr);
                });
        });

        $query->when($filters['name'] ?? null, function ($query, $searchStr) {

            $query
                ->whereHas('user' , fn($query) => $query->where('name' , 'like' , "${searchStr}%"));
        });

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spec()
    {
        return $this->belongsTo(Specialize::class , 'specialize');
    }

    public function requests()
    {
        return $this->hasMany(DoctorOfSubject::class , 'doctor_id');
    }
}
