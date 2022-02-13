<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Category;
use App\Course;
use App\Episode;
use App\Http\Controllers\Controller;
use App\Tag;
use Carbon\Carbon;


class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap', 60);

        if(! $sitemap->isCached() ) {
            $date = Carbon::createFromFormat('Y-m-d H:i:s',now());
            $sitemap->add(url()->to('/sitemap-articles'),$date,'0.9','daily');
            $sitemap->add(url()->to('/sitemap-courses'),$date,'0.9','daily');
            $sitemap->add(url()->to('/sitemap-tags'),$date,'0.9','daily');
            $sitemap->add(url()->to('/sitemap-categories'),$date,'0.9','daily');
            $sitemap->add(url()->to('/sitemap-episodes'),$date,'0.9','daily');
        }

        return $sitemap->render();
    }

    public function articles()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.articles', 60);

        if(! $sitemap->isCached() ) {
            $articles = Article::latest()->status()->get();
            foreach ($articles as $article) {
                $path='/'.$article->lang.'/article/'.$article->slug;

                $sitemap->add(url()->to($path),$article->created_at ,'0.9','Weekly');
            }
        }

        return $sitemap->render();
    }



    public function courses()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.courses', 60);

        if(! $sitemap->isCached() ) {
            $courses = Course::latest()->status()->get();
            foreach ($courses as $course) {
                $path='/'.$course->lang.'/course/'.$course->slug;

                $sitemap->add(url()->to($path),$course->created_at ,'0.9','Weekly');
            }
        }

        return $sitemap->render();
    }

    public function tags()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.tags', 60);

        if(! $sitemap->isCached() ) {
            $tags = Tag::latest()->get();
            foreach ($tags as $tag) {
                $path='/'.$tag->lang.'/tag/'.$tag->slug;

                $sitemap->add(url()->to($path),$tag->created_at ,'0.9','Weekly');
            }
        }

        return $sitemap->render();
    }

    public function categories()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.categories', 60);

        if(! $sitemap->isCached() ) {
            $categories = Category::latest()->get();
            foreach ($categories as $category) {
                $path='/'.$category->lang.'/category/'.$category->slug;

                $sitemap->add(url()->to($path),$category->created_at ,'0.9','Weekly');
            }
        }

        return $sitemap->render();
    }



    public function episodes()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.episodes', 60);

        if(! $sitemap->isCached() ) {
            $episodes = Episode::latest()->get();
            foreach ($episodes as $episode) {
                $path=$episode->path();

                $sitemap->add(url()->to($path),$episode->created_at ,'0.9','Weekly');
            }
        }

        return $sitemap->render();
    }

}
