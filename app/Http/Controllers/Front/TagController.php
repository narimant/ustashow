<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Tag;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;


class TagController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag,$type="article")
    {
		$local=app()->getLocale();
        /*
      * seo strat
      */
        SEOMeta::setTitle($tag->seoData('seoTitle'));
        SEOMeta::setDescription($tag->seoData('seoDescription'));
        SEOMeta::addKeyword($tag->seoData('seoKeyword'));

        OpenGraph::setTitle($tag->seoData('seoTitle'));
        OpenGraph::setDescription($tag->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$tag->path());
        OpenGraph::addProperty('type', 'tag');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);
        $categoryslug=$tag->slug;
        SEOTools::setCanonical($_SERVER['HTTP_HOST'].$tag->path());

        $articles=$tag->articles()->latest()->paginate(12);

        $courses=$tag->courses()->latest()->paginate(12);

        return view('frontend.tagpage',compact('articles','courses','tag','type'));
    }


}
