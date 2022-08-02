<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = ['doctor' , 'student' ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function type()
    {
        if($this->isDoctor()){
            return 'doctor';

        }else if($this->isStudent()){
            return 'student';
        }

        return null;
    }

    public function isStudent()
    {
        return $this->hasOne(Student::class , 'user_id', 'id')->exists();
    }

    public function isDoctor()
    {
        return $this->hasOne(Doctor::class , 'user_id', 'id')->exists();
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

}
