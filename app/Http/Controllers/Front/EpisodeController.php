<?php

namespace App\Http\Controllers\Front;

use App\Episode;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show($course,Episode $episode)
    {
        $local=app()->getLocale();

        /*
   * seo strat
   */
        SEOMeta::setTitle($episode->seoData('seoTitle'));
        SEOMeta::setDescription($episode->seoData('seoDescription'));
        SEOMeta::addKeyword($episode->seoData('seoKeyword'));

        OpenGraph::setTitle($episode->seoData('seoTitle'));
        OpenGraph::setDescription($episode->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$episode->path());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        SEOTools::setCanonical($_SERVER['HTTP_HOST'].$course->path());


        $comment=$episode->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();
        return view('frontend.episode', compact('course','episode','comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        //
    }
}
