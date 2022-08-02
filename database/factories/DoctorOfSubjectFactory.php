<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorOfSubject>
 */
class DoctorOfSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'term_id' => Term::factory(),
            'subject_id' => Subject::factory(),
            'doctor_id' => Doctor::factory(),
        ];
    }
}
