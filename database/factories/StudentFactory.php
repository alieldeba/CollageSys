<?php

namespace Database\Factories;

use App\Models\Specialize;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $grade = rand(1 , 4);
        $gpas = [2 , 2.3 , 2.5 , 3 , 3.3 , 3.5 , 4];

        return [
            'user_id' => User::factory(),
            'specialize' => Specialize::factory(),
            'grade' => $grade,
            'hours' => $grade * 40 ,
            'GPA' => $gpas[rand(0 , count($gpas) - 1)] 
        ];
    }
}
