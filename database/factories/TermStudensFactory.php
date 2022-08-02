<?php

namespace Database\Factories;

use App\Models\DoctorOfSubject;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TermStudens>
 */
class TermStudensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'term_id' => Term::factory(),
            'doctor_of_subject_id' => DoctorOfSubject::factory(),
            'result' => ['P' , 'F' , 'A' , 'B' , 'C' , 'D' , 'A-' , 'B+' , 'B-' , 'C+' , 'C-' , 'D+' , 'D-'][rand(0 , 12)]
        ];
    }
}
