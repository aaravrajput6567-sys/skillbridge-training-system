<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(session()->get('locale'));
        } elseif ($request->hasCookie('locale')) {
            \Illuminate\Support\Facades\App::setLocale($request->cookie('locale'));
        } elseif (auth()->check() && auth()->user()->language_preference) {
            \Illuminate\Support\Facades\App::setLocale(auth()->user()->language_preference);
        }
        
        return $next($request);
    }
}
