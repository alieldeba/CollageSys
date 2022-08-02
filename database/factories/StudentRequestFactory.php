<?php

namespace Database\Factories;

use App\Models\DoctorOfSubject;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentRequest>
 */
class StudentRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['open' , 'rejected' , 'acsepted' , 'pending'];
        return [
            'student_id' => Student::factory(),
            'term_id' => Term::factory(),
            'doctor_of_subjects_id' => DoctorOfSubject::factory(),
            'status'=> $status[rand(0 , 3)]
        ];
    }
}
