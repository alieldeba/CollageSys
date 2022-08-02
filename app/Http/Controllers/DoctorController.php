<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialize;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function show(Doctor $id)
    {
        return view('doctors.show' , [
            'doctor' => $id,
        ]);
    }


    public function Edit(Doctor $id)
    {
        $specs = Specialize::all();
        return view('doctors.edit' , [
            'doctor' => $id,
            'specs' => $specs
        ]);
    }

    public function patch(Doctor $id)
    {
        $atrrips = request()->validate([
            'name' => ['min:3' , 'required'],
            'email' => ['email' , 'required' , Rule::unique('users' , 'email')->ignore($id->user->id)],
            'age' => ['required' , 'numeric'],
            'specialize' => ['required' , Rule::exists('specializes' , 'id')]
        ]);

        $id->user->update([
            'name' => $atrrips['name'],
            'age' => $atrrips['age'],
            'email' => $atrrips['email'],
        ]);

        $id->update([
            'specialize' => $atrrips['specialize']
        ]);

        return back()->with('succss' , 'Account info updated!');

    }
}
