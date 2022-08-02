<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorRequest;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorRequestController extends Controller
{

    public function index(Doctor $id)
    {

        $reqests = DoctorRequest::latest()->where('doctor_id' , $id->id);

        return view('doctors.request.index' , [
            'reqs' => $reqests->filter(request(['subject' , 'status']))->get(),
            'allReqs' => DoctorRequest::latest()->where('doctor_id' , $id->id)->get(),
            'doctor' => $id,
        ]);
    }

    public function create(Doctor $id)
    {

        return view('doctors.request.create' , [
            'term' => Term::latest()->first(),
            'subs' => Subject::all(),
            'doctor' => $id,
        ]);
    }

    public function make(Doctor $id)
    {
        $attrips = request()->validate([
            'subject' => ['required' , Rule::exists('subjects' , 'id')],
            'term' => ['required' , Rule::exists('terms' , 'id')],
        ]);

        DoctorRequest::create([
            'doctor_id' => $id->id, 
            'subject_id' => $attrips['subject'],
            'term_id' => $attrips['term']
        ]);

        return back()->with('succss' , 'Request created!');

    }

}
