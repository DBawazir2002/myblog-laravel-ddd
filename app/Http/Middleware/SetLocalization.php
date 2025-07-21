<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SetLocalization
{
    protected array $supportedLocales = ['en', 'ar'];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $locale = $request->header('Accept-Language');
        $currentLocale = LaravelLocalization::getCurrentLocale();

        if ($currentLocale != $locale) {
            if ($locale && in_array($locale, $this->supportedLocales)) {
                LaravelLocalization::setLocale($locale);
            } else {
                LaravelLocalization::setLocale(config('app.locale'));
            }
        }

        return $next($request);
    }
}
