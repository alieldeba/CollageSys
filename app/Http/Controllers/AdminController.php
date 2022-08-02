<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.welcome');
    }
    
    public function doctorsIndex()
    {

        return view('admin.doctors.index' , [
            'doctors' => Doctor::filter(request(['name' , 'spec']))->paginate(8)->withQueryString()
        ]);
    }

    public function doctorsShow(Doctor $id)
    {
        return view('admin.doctors.show' , [
            'doctor' => $id
        ]);
    }

    public function doctorsEdit(Doctor $id)
    {
        return view('admin.doctors.edit' , [
            'doctor' => $id,
            'specs' => Specialize::all()
        ]);
    }

    public function doctorsDelete(Doctor $id)
    {
        $id->user->delete();
        return redirect('/doctors/all')->with('succss' , 'Doctor Deleted !');
    }

    public function doctorsPatch(Doctor $id)
    {
        $attrips = request()->validate([
            'name' => ['required' , 'min:3'],
            'email' => ['required' , 'email' , Rule::unique('users' , 'email')->ignore($id->user->id)],
            'age' => ['required' , 'numeric'],
            'spec' => ['required' , Rule::exists('specializes' , 'id')],
            'admin' => ['required' , 'boolean']
        ]);


        // update doctor specialize
        $id->update([
            'specialize' => $attrips['spec']
        ]);

        // update doctor -> user 
        $id->user->update([
            'name' => $attrips['name'],
            'email' => $attrips['email'],
            'admin' => $attrips['admin'],
            'age' => $attrips['age'],
        ]);

        return back()->with('succss' , 'Doctor Info Updated !');
    }

    public function doctorsCreate()
    {
        return view('admin.doctors.create' ,[
            'specs' => Specialize::all()
        ]);
    }

    public function doctorsMake()
    {
        $attrips = request()->validate([
            'name' => ['required', 'min:3'],
            'password' => ['required', 'min:8'],
            'email' => ['required', 'email' , Rule::unique('users' , 'email')],
            'age' => ['required', 'numeric'],
            'spec' => ['required', Rule::exists('specializes' , 'id')],
            'admin' => ['required' , 'boolean']
        ]);

        $user = User::create([
            'name' => $attrips['name'],
            'password' => $attrips['password'],
            'email' => $attrips['email'],
            'age' => $attrips['age'],
            'admin' => $attrips['admin'],
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'specialize' => $attrips['spec']
        ]);

        return back()->with('succss' , 'Doctor Created !');

    }
}
