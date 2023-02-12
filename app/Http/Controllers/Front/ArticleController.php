<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use http\Env;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function single(Article $article)
    {


        $local=app()->getLocale();


        $related = Article::where('lang',$local)->whereHas('tags', function ($q) use ($article) {
            return $q->whereIn('name', $article->tags->pluck('name'));
        })
            ->where('id', '!=', $article->id) // So you won't fetch same post
            ->get();
        $article->increment('ViewCount');

        $comment=$article->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();


        /*
         * seo strat
         */
        SEOMeta::setTitle($article->seoData('seoTitle'));
        SEOMeta::setDescription($article->seoData('seoDescription'));
        SEOMeta::addKeyword($article->seoData('seoKeyword'));

        OpenGraph::setTitle($article->seoData('seoTitle'));
        OpenGraph::setDescription($article->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$article->path());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        SEOTools::setCanonical($_SERVER['HTTP_HOST'].$article->path());

        if($article->status==0)
        {
            abort(404);
        }
        return view('frontend.article',compact('article','comment','related'));
    }

}
