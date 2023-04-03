<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class SpecifyUserType
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
        $response = $next($request);

        if(! auth()->check()){
            return back();
        }
        switch (auth()->user()->userable_type) {
            case "App\Models\Patient":
                return redirect()->intended(RouteServiceProvider::PHOME);
                break;
            case "App\Models\Doctor":
                return redirect()->intended(RouteServiceProvider::DHOME);
                break;
            default:
                dd('doctor');
                break;
        }

        return $response;
    }
}
