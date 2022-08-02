<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOrCurrentDoctor
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
        $currentDoctor = $request->route('id');

        // dd($currentDoctor);

        if(auth()->user()->doctor->id != $currentDoctor->id && !auth()->user()->admin){
            return back()->with('err' , 'Can\'t accsses this page!');
        }

        return $next($request);
    }
}
