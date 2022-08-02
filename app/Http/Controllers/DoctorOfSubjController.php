<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorOfSubject;
use Illuminate\Http\Request;

class DoctorOfSubjController extends Controller
{
    public function history(Doctor $id)
    {

        return view('doctors.history' , [
            'history' => $id->requests,
            'doctor' => $id,
        ]);
    }
}
