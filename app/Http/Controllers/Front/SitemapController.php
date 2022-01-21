<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap', 60);

        if(! $sitemap->isCached() ) {
            $sitemap->add(url()->to('/sitemap-articles'),'2017-08-25T20:10:00+02:00','0.9','daily');
        }

        return $sitemap->render();
    }

    public function article()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.articles', 60);

        if(! $sitemap->isCached() ) {
            $articles = Article::latest()->get();
            foreach ($articles as $article) {
                $sitemap->add(url()->to($article->path()),$article->created_at ,'0.9','Weekly');
            }
        }

        return $sitemap->render();
    }
}
