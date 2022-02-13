<?php

namespace App\Http\Controllers\Front;

use App\Article;

use App\Course;
use App\Http\Controllers\Controller;
use App\Siteseo;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;
use UxWeb\SweetAlert\SweetAlert;


class HomeController extends Controller
{


    public function index()
    {


        $local=app()->getLocale();

        $seosite=Siteseo::where('lang',$local)->First();
        SEOMeta::setTitle($seosite->site_title);
        SEOMeta::setDescription($seosite->site_description);
        SEOMeta::addKeyword($seosite->site_keyword);

        OpenGraph::setTitle($seosite->site_title);
        OpenGraph::setDescription($seosite->site_description);
        OpenGraph::setUrl($_SERVER['HTTP_HOST']);

        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);
        if(cache()->has('articles')){
            $articles=cache('articles');
        }else{
            $articles=Article::status()->latest()->take(4)->get();
            cache(['articles'=>$articles,Carbon::now()->addMinute(10)]);
        }


        if(cache()->has('courses')){
            $courses=cache('courses');
        }else{
            $courses=Course::latest()->take(4)->get();
            cache(['courses'=>$courses,Carbon::now()->addMinute(10)]);
        }

        $articles=Article::status()->whereLang($local)->latest()->take(4)->get();
        $courses=Course::latest()->take(4)->get();
        return view('frontend.index',compact('articles','courses'));
    }


    public function comment(Request $request)
    {

        $validated = $request->validate([
            'comment' => 'required|min:5',

        ]);


        auth()->user()->comments()->create($request->all());
        alert()->success( __('messages.add comment successfully'));
       return back();

    }


    public function search()
    {

       $keyword=\request('search');
       $articles=Article::search($keyword)->latest()->paginate(10);
       return view('frontend.search',compact('articles'));

    }

    public function switchLanguage($lang)
    {

        if ( array_key_exists($lang,config('app.locales')))
        {
            Cookie::queue(\Cookie::forget('lang'));
            Cookie::queue('lang',$lang,60*24);
                if($lang==config('app.fallback_locale'))
                {
                    return redirect('/');
                }
            return redirect('/'.$lang);
        }else
        {

            return redirect('/');
        }


    }
}
