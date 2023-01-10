<?php

namespace App\Providers;

use App\Category;
use App\Page;
use App\Tag;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Article;
use App\Course;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('articleSlug' , function ($value) {
            return Article::whereSlug($value)->firstOrFail();
        });

        Route::bind('courseSlug' , function ($value) {
            return Course::whereSlug($value)->firstOrFail();
        });

        Route::bind('categorySlug' , function ($value) {
            return Category::whereSlug($value)->firstOrFail();
        });
        Route::bind('tagSlug' , function ($value) {
            return Tag::whereSlug($value)->firstOrFail();
        });
        Route::bind('pages' , function ($value) {
            return Page::whereSlug($value)->firstOrFail();
        });
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {



            $local=request()->segment(1);



        if(array_key_exists($local,config('app.locales')))
        {


            app()->setLocale($local);

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix($local)
                ->group(base_path('routes/web.php'));
        }else
        {
            $local=app()->setLocale('app.fallback_locale');

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix($local)
                ->group(base_path('routes/web.php'));
        }




    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
