<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $local=$request->segment(1);
        if(array_key_exists($local,config('app.locales')))
        {

                 app()->setLocale($local);
        }else
        {
            app()->setLocale(config('app.fallback_locale'));
        }



        return $next($request);
    }
}
