<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('applocale') && in_array(session()->get('applocale'), ['en', 'hr'])){
            App::setLocale(session()->get('applocale'));
        }else{
            App::setLocale(config()->get('app.fallback_locale'));
        }

        return $next($request);
    }
}
