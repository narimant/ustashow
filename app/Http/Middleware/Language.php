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
    
        /*
         * for use this section you can pass for get request()->ip()
         */
       $position = Location::get(request()->ip());

       if($position!=null)
       {
            $countryCode=$position->countryCode;
       }else
        {
            $countryCode=config('app.fallback_locale');
       }

 if($local!='file-manager')
        {
        if(!array_key_exists($local,config('app.locales')))
        {
            $segments=$request->segments();
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
               $segments[0]=$local;
                return redirect(implode('/',$segments));

            }

            if(Cookie::get('lang') != null  )
            {
                $local=Cookie::get('lang');
                $segments[0]=$local;
            }
            else
            {
                $segments[0]=config('app.fallback_locale');
            }

           if( $segments[0]!=config('app.fallback_locale'))
            {
                return redirect(implode('/',$segments));
          }else
           {
               return redirect(config('app.fallback_locale'));
           }

        }
      else
        {
           Cookie::queue(\Cookie::forget('lang'));
            Cookie::queue('lang',$local,60*24);
       }

 }
        app()->setLocale($local);


        return $next($request);
    }
}
