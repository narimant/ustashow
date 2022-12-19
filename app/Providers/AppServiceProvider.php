<?php

namespace App\Providers;




use App\Comment;
use App\Page;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('path.public', function() {
      return base_path().'/public_html';
    });
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('recaptcha', function($attribute, $value, $parameters, $validator) {

           $client=new Client();
            $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => config('services.recaptcha.secretkey'),
                    'response' => $value,
                    'remoteip' =>request()->ip(),
                ]
            ]);
            $response=json_decode($response->getBody());

           return $response->success;
        }, 'Please confirm the recaptcha and fill this');

        view()->composer('Admin.master' , function($view) {
            $confirmedmessage = Comment::where('status' , 1);
            $view->with([ 'confirmedmessage' => $confirmedmessage]);
        });
        view()->composer('Admin.master' , function($view) {
             $newcomment = Comment::where('status' , 0);
            $view->with([ 'newcomment' => $newcomment]);
        });
        view()->composer('frontend.frontendlayout.frontendmaster',function ($view){
            $local=app()->getLocale();
            $footerPages = Page::where('status' ,1)->where('lang',$local)->where('attachTo','footer');
            $view->with([ 'footerPages' => $footerPages]);
        });

    }
}
