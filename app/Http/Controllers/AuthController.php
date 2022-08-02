<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect('login')->with('succss' , 'logged out!');
    }


    public function signup_get()
    {
        return view('auth.signup');
    }

    public function signup_post()
    {
        $atrrips = request()->validate([
            'name' => ['required'],
            'email' => ['required' , 'email' ],
            'password' => ['min:8' , 'required'],
            'age' => ['numeric' , 'nullable']
        ]);


        if(User::all()->where('email' , request('email'))->count()){
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be varefied.'
                ]);
        }

        $user = User::create([
            'name' => $atrrips['name'],
            'password' => $atrrips['password'],
            'email' => $atrrips['email'],
            'age' => $attrips["age"] ?? null,
        ]);

        auth()->login($user);

        return redirect('/')->with('succss' , 'signed up!');

    }


    public function login_get()
    {
        return view('auth.login');
    }

    public function login_post()
    {    
        $attrips = request()->validate([
            'email' => ['email' , 'required'],
            'password' => ['min:8' , 'required']
        ]);

        if(auth()->attempt($attrips)){
            return redirect('/')->with('succss' , 'Welcome back ' . auth()->user()->name);
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be varefied.'
            ]);
    }
}
