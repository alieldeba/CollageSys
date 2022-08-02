<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOrCurrentStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $currentStudent = $request->route('id');

        // dd($currentStudent);

        if(auth()->user()->student->id != $currentStudent->id && !auth()->user()->admin){
            return back()->with('err' , 'Can\'t accsses this page!');
        }

        return $next($request);
    }
}
