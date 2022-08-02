<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    public function show(Student $id)
    {
        return view('students.show' , [
            'student' => $id
        ]);
    }

    public function edit(Student $id)
    {
        return view('students.edit' , [
            'student' => $id
        ]);
    }

    public function patch(Student $id)
    {
        $attrips = request()->validate([
            'name' => ['required'],
            'email' => ['required' , 'email' , Rule::unique('users' , 'email')->ignore($id->user->id)],
            'age' => ['required' , 'numeric'],
        ]);

        // if(User::all()->where('email' , $attrips['email'])->count()){
        //     return back()->with('err' , 'Account exists!');
        // }

        $id->user()->update([
            'name' => $attrips['name'],
            'email' => $attrips['email'],
            'age' => $attrips['age'],
        ]);

        return back()->with('succss' , 'Account info updated!');
    }

}
