<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\DoctorOfSubject;
use App\Models\DoctorRequest;
use App\Models\Specialize;
use App\Models\Student;
use App\Models\StudentRequest;
use App\Models\Subject;
use App\Models\Term;
use App\Models\TermStudens;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $user = User::factory()->create([
            'name' => 'Belal Ibrahim',
            'age' => 22,
            'email' => 'belal@belal.com',
            'password' => 'password',
            'admin' => true
        ]);

        $user2 = User::factory()->create([
            'name' => 'Belal Mohamed',
            'age' => 22,
            'email' => 'belal@belal.com0',
            'password' => 'password',
            'admin' => false
        ]);

        $sub = Subject::factory(1)->create();
        Subject::factory(15)->create();

        $specializes = Specialize::factory(1)->create();
        Specialize::factory(4)->create();


        
        $student = Student::factory(1)->create([
            'user_id' => $user2->id
        ]);

        Student::factory(9)->create();
        
        
        $doctor = Doctor::factory(1)->create([
            'user_id' => $user->id
        ]);
        Doctor::factory(5)->create();
        
        
        
        $term_studen = TermStudens::factory(1)->create();
        TermStudens::factory(2)->create([
            'student_id' => 1,
            'result' => 'p'
        ]);

        TermStudens::factory(2)->create([
            'student_id' => 1,
            'term_id' => 2,
            'result' => 'p'
        ]);
        
        $term = Term::factory(1)->create();


        StudentRequest::factory(4)->create();
        DoctorRequest::factory(4)->create();


        $doctor_of_subjects = DoctorOfSubject::factory(1)->create();
        DoctorOfSubject::factory(10)->create([
            'term_id' => Term::latest('id')->first()->id
        ]);
        
        $reqDoc = DoctorRequest::factory(1)->create([
            'status' => 'open',
            'term_id' => Term::latest('id')->first()->id
        ]);

        $reqStudent = StudentRequest::factory(1)->create([
            // 'student_id' => $student->id,
            'student_id' => 1,
            'status' => 'open',
            'term_id' => Term::latest('id')->first()->id,
            'doctor_of_subjects_id' => DoctorOfSubject::latest('id')->first()->id
        ]);

        
    }
}
