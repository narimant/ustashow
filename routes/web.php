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
Route::get('/logintest',function ()
{
    return view('auth.test');
});
Route::namespace('Front')->group(function (){
    Route::get('/','Homecontroller@index')->name('index');
    Route::get('/articles/{articleSlug}','ArticleController@single');
    Route::get('/courses/{courseSlug}','CourseController@single');

    Route::get('/courses/{courseSlug}/episode/{episode}','EpisodeController@show' );
    Route::post('comment','HomeController@comment')->name('comment.send');
    Route::get('/sitemap','SitemapController@index');
    Route::get('/sitemap-articles','SitemapController@article');
    // Download Route
    Route::get('/download/{episode}' , 'CourseController@download');
    Route::get('/search','HomeController@search')->name('home.search');
});

Route::namespace('Front')->middleware('auth:web')->group(function (){
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




Auth::routes(['verify' => true]);

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


Route::namespace('Admin')->prefix('/admin')->middleware(['auth:web','chekAdmin','verified'])->group(function (){
    Route::get('/panel','AdminController@index');
    Route::post('/panel/upload-image','PanelController@CkUploadImage');
    Route::resource('articles','ArticleController');
    Route::resource('courses','CourseController');
    Route::resource('episodes','EpisodeController');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');

    //comment routes
    Route::get('/comments/unsucsess','CommentController@unsucsessfull')->name('comments.unsucsess');
    Route::resource('comments','CommentController');

    //peyments route
    Route::get('/payments/unsucsess','PaymentContoller@unsuccessful')->name('payments.unsucsess');
    Route::resource('payments','PaymentContoller');

    Route::group(['/users'],function (){
        Route::get('/index','UserController@index')->name('users.index');
        Route::resource('lvl','lvlManageController')->parameters(['lvl'=>'user']);
        Route::delete('/{user}/destroy','UserController@destrpy')->name('users.destroy');
    });
});


Route::get('/home',function (){
    return view('home');
});


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

