<?php

namespace App\Http\Controllers\Front;

use App\Article;

use App\Course;
use App\Footer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Page;
use App\Siteseo;
use App\SiteSetting;
use App\Video;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;
use UxWeb\SweetAlert\SweetAlert;


class HomeController extends Controller
{


    public function index()
    {


        $local=app()->getLocale();

        $seosite=Siteseo::where('lang',$local)->First();
        if($seosite != null)
        {
            SEOMeta::setTitle($seosite->site_title);
            SEOMeta::setDescription($seosite->site_description);
            SEOMeta::addKeyword($seosite->site_keyword);

            OpenGraph::setTitle($seosite->site_title);
            OpenGraph::setDescription($seosite->site_description);
            OpenGraph::setUrl($_SERVER['HTTP_HOST']);
        }


        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        if(cache()->has('articles.'.$local)){
            $articles=cache('articles');
        }else{
            $articles=Article::status()->whereLang($local)->latest()->take(4)->get();
            cache(['articles'=>$articles,Carbon::now()->addMinute(100)]);
        }


        if(cache()->has('courses.'.$local)){
            $courses=cache('courses');
        }else{
            $courses=Course::status()->whereLang($local)->latest()->take(4)->get();
            cache(['courses'=>$courses,Carbon::now()->addMinute(100)]);
        }


        //videos
        if(cache()->has('videos.'.$local)){
            $videos=cache('videos');
        }else{
            $videos=Video::status()->whereLang($local)->latest()->take(4)->get();
            cache(['videos'=>$videos,Carbon::now()->addMinute(100)]);
        }


        return view('frontend.index',compact('videos','articles','courses'));
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



    public function pages(Page $pages)
    {
        $local=app()->getLocale();


        /*
       * seo strat
       */
        SEOMeta::setTitle($pages->seoData('seoTitle'));
        SEOMeta::setDescription($pages->seoData('seoDescription'));
        SEOMeta::addKeyword($pages->seoData('seoKeyword'));

        OpenGraph::setTitle($pages->seoData('seoTitle'));
        OpenGraph::setDescription($pages->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$pages->path());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);


        $comment=$pages->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();
        return view('frontend.page',compact('pages','comment'));
    }


    public function contact()
    {


        $local=app()->getLocale();
            $site_title=__('messages.contact title');
            $site_description=__('messages.contact description');
           $site_keyword=__('messages.contact keyword');



        SEOMeta::setTitle($site_title);
        SEOMeta::setDescription($site_description);
        SEOMeta::addKeyword($site_keyword);

        OpenGraph::setTitle($site_title);
        OpenGraph::setDescription($site_description);
        OpenGraph::setUrl($_SERVER['HTTP_HOST']);

        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        return view('frontend.contact');
    }

    public function contactSend(ContactRequest $request)
    {
        $data=[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'messages'=>$request->messages,
        ];
        $amdin_email=SiteSetting::where('key','admin_email')->first();
        Mail::to('info@ustashow.com')->send(new ContactMail($data));
        return redirect()->back()->withErrors('msg','your contact sucsess fulley send');
    }
}
