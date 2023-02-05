<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfAvailableForBooking
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
        $clinic = $request->route('clinic');
        $doctor_id = $request->route('doctor_id');
        if ($clinic->setting()->where('doctor_id', $doctor_id)->first('is_available')->is_available) {
            return $next($request);
        }

        return alert('This doctor is not available at this clinic at the moment', false, 400);
    }
}
