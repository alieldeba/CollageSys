<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\TermStudens;
use Illuminate\Http\Request;

class TermStudentsController extends Controller
{
    public function history(Student $id)
    {

        // dd(TermStudens::filter([
        //     'term' => '',
        //     'student_id' => $id->id
        //     ])->get()->unique('term_id'));

        return view('students.history' , [
            'history' => TermStudens::filter([
                'term' => request('term'),
                'student_id' => $id->id
                ])->get(),
            'student' => $id,
            'allHistory' => $id->termStudent->unique('term_id')
        ]);
    }
}
