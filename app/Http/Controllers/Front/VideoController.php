<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Video;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function single(Video $video)
    {



        $local=app()->getLocale();


        $related = Video::where('lang',$local)->whereHas('tags', function ($q) use ($video) {
            return $q->whereIn('name', $video->tags->pluck('name'));
        })
            ->where('id', '!=', $video->id) // So you won't fetch same post
            ->get();
        $video->increment('ViewCount');

        $comment=$video->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();


        /*
         * seo strat
         */
        SEOMeta::setTitle($video->seoData('seoTitle'));
        SEOMeta::setDescription($video->seoData('seoDescription'));
        SEOMeta::addKeyword($video->seoData('seoKeyword'));

        OpenGraph::setTitle($video->seoData('seoTitle'));
        OpenGraph::setDescription($video->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$video->path());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        SEOTools::setCanonical($_SERVER['HTTP_HOST'].$video->path());


        return view('frontend.video',compact('video','comment','related'));
    }
}
