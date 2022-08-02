<?php

namespace App\Http\Controllers;

use App\Models\Student;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;

use App\Models\StudentRequest;
use App\Models\DoctorOfSubject;
use App\Models\Term;
use App\Models\TermStudens;
use Illuminate\Validation\Rule;

class StudentRequestController extends Controller
{
    public function index(Student $id)
    {
        return view('students.request.index', [
            'student' => $id,
            'reqs' => StudentRequest::filter([
                'student_id' => $id->id,
                'term' => request('term'),
                'status' => request('status'),
            ])->get(),
            'allReqs' => $id->requests
        ]);
    }

    public function create(Student $id)
    {
        // student cant request same subject twice or request subject that already in his term
        // thus we are going to reject these form our cellection of DoctorOfSubjects


        // this term id
        $currentTerm = Term::latest('id')->first()->id;

        // current student requests for this term
        $requests = StudentRequest::filter([
            'student_id' => $id->id,
            'term' => $currentTerm,
        ])->get();

        // subjects in this term
        $termStudent = TermStudens::filter([
            'term' => $currentTerm,
            'student_id' => $id->id
        ])->get();


        $validSubjects =
            DoctorOfSubject::where('term_id', '22')->get()->reject(
                function ($el) use ($requests, $termStudent) {
                    foreach ($requests as $req) {
                        if ($req->doctor_of_subjects_id == $el->id) {
                            return true;
                        }
                    }
                    foreach ($termStudent as $termStudent) {
                        if ($termStudent->doctor_of_subject_id == $el->id) {
                            return true;
                        }
                    }
                    return false;
                }
            );

        // dd($validSubjects);

        return view('students.request.create', [
            'subjects' => $validSubjects,
        ]);
    }

    public function make(Student $id){
        $attrips = request()->validate([
            'doctorOfSubject' => [Rule::exists('doctor_of_subjects' , 'id')],
            'term_id' => [Rule::exists('terms' , 'id')]
        ]);

        StudentRequest::create([
            'student_id' => $id->id,
            'doctor_of_subjects_id' => $attrips['doctorOfSubject'],
            'term_id' => $attrips['term_id'],
        ]);

        return back()->with('succss' , 'Request created! ');
    }

}
