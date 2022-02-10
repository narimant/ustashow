<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;

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

        $position = Location::get();
        $countryCode=$position->countryCode;

        if(Cookie::get('userCountry') == null)
        {
            Cookie::queue('userCountry',$countryCode,60*24);

            if($countryCode=='IR')
            {
                $local='fa';
                Cookie::queue('lang',$local,60*24);

            }elseif($countryCode=='TR')
            {
                $local='tr';
                Cookie::queue('lang',$local,60*24);
            }else
            {
                $local='en';
                Cookie::queue('lang',$local,60*24);
            }

        }



        if(Cookie::get('lang') != null  )
        {
            $local=Cookie::get('lang');

        }
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
