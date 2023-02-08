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

    Route::get('page/{pages}','HomeController@pages');

    Route::get('/','HomeController@index')->name('index');
    Route::get('/article/{articleSlug}','ArticleController@single');
    Route::get('/video/{video:slug}','VideoController@single');
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
    Route::get('/sitemap-pages','SitemapController@pages');

    //contact pages
    Route::get('/contact','HomeController@contact')->name('contact.index');
    Route::post('/contact','HomeController@contactSend')->name('contact.send');

    // Download Route
    Route::get('/download/{episode}' , 'CourseController@download');
    Route::get('/search','HomeController@search')->name('home.search');
});

Route::namespace('Front')->middleware(['auth:web','verified'])->group(function (){
    Route::post('/course/Payment','PaymentController@peyment')->name('course.payment');
    Route::get('course/Payment/check','PaymentController@check');


    Route::prefix('/dashboard')->group(function (){
        Route::get('/', 'UserPanelController@index')->name('panel.index');
        Route::get('/history', 'UserPanelController@history')->name('panel.history');
        Route::get('/vip', 'UserPanelController@vip')->name('panel.vip');

        Route::post('/payment', 'UserPanelController@payment')->name('panel.payment');
        Route::get('/check', 'UserPanelController@check')->name('panel.check');
    });
});






Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('google.callback');


Route::namespace('Admin')->prefix('/admin')->middleware(['auth:web','chekAdmin','verified'])->group(function (){
    Route::get('/panel','AdminController@index')->name('admin.index');
    Route::post('/panel/upload-image','PanelController@CkUploadImage')->name('panel.upload');

    //Article Section
    Route::resource('articles','ArticleController');
    Route::get('article/{id}','ArticleController@restore')->name('article.restore');
    Route::get('article/publish/{id}','ArticleController@publish')->name('article.publish');
    Route::delete('article/{id}','ArticleController@forceDelete')->name('article.forceDelete');


    //videos section
    Route::resource('videos','VideoController');
    Route::get('videos/{id}','VideoController@restore')->name('videos.restore');
    Route::get('videos/publish/{id}','VideoController@publish')->name('videos.publish');
    Route::delete('videos/{id}','VideoController@forceDelete')->name('videos.forceDelete');

    //Course Section
    Route::resource('courses','CourseController');
    Route::delete('course/{id}','CourseController@forceDelete')->name('course.forceDelete');
    Route::get('course/publish/{id}','CourseController@publish')->name('course.publish');
    Route::get('course/{id}','CourseController@restore')->name('course.restore');

    //Episode Section
    Route::resource('episodes','EpisodeController');
    Route::delete('episode/{id}','EpisodeController@forceDelete')->name('episode.forceDelete');
    Route::get('episode/{id}','EpisodeController@restore')->name('episode.restore');
    Route::get('episode/publish/{id}','EpisodeController@publish')->name('episode.publish');

    //Role Section
    Route::resource('roles','RoleController');

    //Perimisions Section
    Route::resource('permissions','PermissionController');

    //Category Section
    Route::resource('categories','CategoryController') ;

    //Tags Section
    Route::resource('tags','TagController') ;




    //pages section
    Route::resource('pages','PageController');
    Route::get('pageItem/{id}','PageController@restore')->name('pageItem.restore');
    Route::get('pageItem/publish/{id}','PageController@publish')->name('pageItem.publish');
    Route::delete('pageItem/{id}','PageController@forceDelete')->name('pageItem.forceDelete');


    //Site Theme Settings
    Route::get('/footer','ThemeController@footer')->name('footer.index');
    Route::post('/footer','ThemeController@footerStore')->name('footer.store');

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
        Route::delete('/{user}/destroy','UserController@destroy')->name('users.destroy');
        Route::get('/{user}/edit','UserController@edit')->name('user.edit');
        Route::put('/user/{user}','UserController@update')->name('user.update');
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

