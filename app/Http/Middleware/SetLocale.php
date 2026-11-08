<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Apply the locale saved in the session for the current request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('locale', $request->cookie('locale'));

        if (is_string($locale) && array_key_exists($locale, config('languages', []))) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
