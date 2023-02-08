<?php

namespace App\Http\Controllers\Front;


use App\Category;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;


class CategoryController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $local=app()->getLocale();
        $articles=$category->articles()->latest()->paginate(15);
        $courses=$category->courses()->latest()->paginate(15);

        /*
        * seo strat
        */
        SEOMeta::setTitle($category->seoData('seoTitle'));
        SEOMeta::setDescription($category->seoData('seoDescription'));
        SEOMeta::addKeyword($category->seoData('seoKeyword'));

        OpenGraph::setTitle($category->seoData('seoTitle'));
        OpenGraph::setDescription($category->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$category->path());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        $categoryslug=$category->slug;
        SEOTools::setCanonical($_SERVER['HTTP_HOST'].$category->path());


            return view('frontend.categorypagearticle',compact('articles','categoryslug','category'));


           // return view('frontend.categorypagecourse',compact('courses','categoryslug'));


    }


}
