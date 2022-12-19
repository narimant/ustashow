<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Course;
use App\Episode;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function single(Course $course)
    {
  		$local=app()->getLocale();
        $related = Course::where('lang',$local)->whereHas('tags', function ($q) use ($course) {
            return $q->whereIn('name', $course->tags->pluck('name'));
        })
            ->where('id', '!=', $course->id) // So you won't fetch same post
            ->get();
        $course->increment('ViewCount');

        $comment=$course->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();

        /*
       * seo strat
       */
        SEOMeta::setTitle($course->seoData('seoTitle'));
        SEOMeta::setDescription($course->seoData('seoDescription'));
        SEOMeta::addKeyword($course->seoData('seoKeyword'));

        OpenGraph::setTitle($course->seoData('seoTitle'));
        OpenGraph::setDescription($course->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$course->path());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        SEOTools::setCanonical($_SERVER['HTTP_HOST'].$course->path());


        return view('frontend.courses', compact('course','comment','related'));
            
       
    }


    public function download(Episode $episode)
    {
        $hash = 'fds@#T@#56@sdgs131fasfq' . $episode->id . \request()->ip() . \request('t');

        if(Hash::check($hash , \request('mac'))) {


                return response()->download(storage_path($episode->VideoUrl));


        } else {
            return 'لینک دانلود شما از کار افتاده است';
        }


    }
}
