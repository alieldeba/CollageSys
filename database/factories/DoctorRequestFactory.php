<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorRequest>
 */
class DoctorRequestFactory extends Factory
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
            'doctor_id' => Doctor::factory(),
            'term_id' => Term::factory(),
            'subject_id' => Subject::factory(),
            'status'=> $status[rand(0 , 3)]
        ];
    }
}
