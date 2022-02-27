<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





//front end routes//

use Illuminate\Support\Facades\Route;

Route::namespace('Front')->group(function (){
    Route::get('language/{lang}','HomeController@switchLanguage');
    Route::get('/','HomeController@index')->name('index');
    Route::get('/article/{articleSlug}','ArticleController@single');
    Route::get('/course/{courseSlug}','CourseController@single');
    Route::get('/category/{categorySlug}','CategoryController@show');
    Route::get('/tag/{tagSlug}/{type?}','TagController@show')->name('tag.show');

    Route::get('/courses/{courseSlug}/episode/{episode}','EpisodeController@show' );
    Route::post('comment','HomeController@comment')->name('comment.send');

    //sitemap
    Route::get('/sitemap','SitemapController@index');
    Route::get('/sitemap-articles','SitemapController@articles');
    Route::get('/sitemap-courses','SitemapController@courses');
    Route::get('/sitemap-tags','SitemapController@tags');
    Route::get('/sitemap-categories','SitemapController@categories');
    Route::get('/sitemap-episodes','SitemapController@episodes');


    // Download Route
    Route::get('/download/{episode}' , 'CourseController@download');
    Route::get('/search','HomeController@search')->name('home.search');
});

Route::namespace('Front')->middleware(['auth:web','verified'])->group(function (){
    Route::post('/course/Payment','PaymentController@peyment');
    Route::get('course/Payment/check','PaymentController@check');


    Route::prefix('/dashboard')->group(function (){
        Route::get('/', 'UserpanelController@index')->name('panel.index');
        Route::get('/history', 'UserpanelController@history')->name('panel.history');
        Route::get('/vip', 'UserpanelController@vip')->name('panel.vip');

        Route::post('/payment', 'UserpanelController@payment')->name('panel.payment');
        Route::get('/check', 'UserpanelController@check')->name('panel.check');
    });
});






Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


Route::namespace('Admin')->prefix('/admin')->middleware(['auth:web','chekAdmin','verified'])->group(function (){
    Route::get('/panel','AdminController@index');
    Route::post('/panel/upload-image','PanelController@CkUploadImage');
    Route::resource('articles','ArticleController');
    Route::get('article/{id}','ArticleController@restore')->name('article.restore');
    Route::get('article/publish/{id}','ArticleController@publish')->name('article.publish');
    Route::delete('article/{id}','ArticleController@forceDelete')->name('article.forceDelete');
    Route::get('course/{id}','CourseController@restore')->name('course.restore');
    Route::get('course/publish/{id}','CourseController@publish')->name('course.publish');
    Route::delete('course/{id}','CourseController@forceDelete')->name('course.forceDelete');
    Route::get('episode/{id}','EpisodeController@restore')->name('episode.restore');
    Route::get('episode/publish/{id}','EpisodeController@publish')->name('episode.publish');
    Route::delete('episode/{id}','EpisodeController@forceDelete')->name('episode.forceDelete');
    Route::resource('courses','CourseController');
    Route::resource('episodes','EpisodeController');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('categories','CategoryController') ;
    Route::resource('tags','TagController') ;
    //comment routes
    Route::get('/comments/unsucsess','CommentController@unsucsessfull')->name('comments.unsucsess');
    Route::resource('comments','CommentController');


    //site seo

    Route::resource('siteseo','SiteseoController');

    //peyments route
    Route::get('/payments/unsucsess','PaymentContoller@unsuccessful')->name('payments.unsucsess');
    Route::resource('payments','PaymentContoller');

    Route::group(['/users'],function (){
        Route::get('/index','UserController@index')->name('users.index');
        Route::get('/myprofile','UserController@myProfile')->name('users.profile');
        Route::post('/uploadimage','UserController@userImage')->name('users.uploadImage');
        Route::resource('lvl','lvlManageController')->parameters(['lvl'=>'user']);
        Route::delete('/{user}/destroy','UserController@destrpy')->name('users.destroy');
    });
});




Auth::routes(['verify' => true]);
//Route::get('/',function (){
//    alert()->success('Success Message', 'Optional Title');
//    return view('welcome');
//});
//Route::post('/getrecap',function (Request $request)
//{
//    $r=$request->validate([
//
//            'g-recaptcha-response'=>'recaptcha',
//
//    ]);
//
//   return request()->all();
//});

