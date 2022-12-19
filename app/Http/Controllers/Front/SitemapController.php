<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Category;
use App\Course;
use App\Episode;
use App\Http\Controllers\Controller;
use App\Page;
use App\Tag;
use Carbon\Carbon;


class SitemapController extends Controller
{
    public function index()
    {
        $language=app()->getLocale();

        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap'.$language, 60);

        if(! $sitemap->isCached() ) {
            $date = Carbon::createFromFormat('Y-m-d H:i:s',now());

            $sitemap->addSitemap(url()->to($language.'/sitemap-articles'),$date,'0.9','daily');
            $sitemap->addSitemap(url()->to($language.'/sitemap-courses'),$date,'0.9','daily');
            $sitemap->addSitemap(url()->to($language.'/sitemap-tags'),$date,'0.9','daily');
            $sitemap->addSitemap(url()->to($language.'/sitemap-categories'),$date,'0.9','daily');
            $sitemap->addSitemap(url()->to($language.'/sitemap-episodes'),$date,'0.9','daily');
            $sitemap->addSitemap(url()->to($language.'/sitemap-pages'),$date,'0.9','daily');
        }

        return $sitemap->render('sitemapindex');
    }

    public function articles()
    {
        $language=app()->getLocale();
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.articles'.$language, 60);

        if(! $sitemap->isCached() ) {
            $articles = Article::whereLang($language)->latest()->status()->get();
            if(!empty($articles))
            {
                foreach ($articles as $article) {
                    $path='/'.$article->lang.'/article/'.$article->slug;

                    $sitemap->add(url()->to($path),$article->created_at ,'0.9','Weekly');
                }
            }

        }

        return $sitemap->render('xml');
    }



    public function courses()
    {
        $language=app()->getLocale();
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.courses'.$language, 60);

        if(! $sitemap->isCached() ) {
            $courses = Course::whereLang($language)->latest()->status()->get();
            if (!empty($courses))
            {
                foreach ($courses as $course) {
                    $path='/'.$course->lang.'/course/'.$course->slug;

                    $sitemap->add(url()->to($path),$course->created_at ,'0.9','Weekly');
                }
            }

        }

        return $sitemap->render('xml');
    }

    public function tags()
    {
        $language=app()->getLocale();
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.tags'.$language, 60);

        if(! $sitemap->isCached() ) {
            $tags = Tag::whereLang($language)->latest()->get();
            if (!empty($tags))
            {
                foreach ($tags as $tag) {
                    $path='/'.$tag->lang.'/tag/'.$tag->slug;

                    $sitemap->add(url()->to($path),$tag->created_at ,'0.9','Weekly');
                }
            }

        }

        return $sitemap->render('xml');
    }

    public function categories()
    {
        $language=app()->getLocale();
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.categories'.$language, 60);

        if(! $sitemap->isCached() ) {
            $categories = Category::whereLang($language)->latest()->get();
            if (!empty($categories))
            {
                foreach ($categories as $category) {
                    $path='/'.$category->lang.'/category/'.$category->slug;

                    $sitemap->add(url()->to($path),$category->created_at ,'0.9','Weekly');
                }
            }

        }

        return $sitemap->render('xml');
    }



    public function episodes()
    {
        $language=app()->getLocale();
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.episodes'.$language, 60);

        if(! $sitemap->isCached() ) {
            $episodes = Episode::whereLang($language)->latest()->get();
            if (!empty($episodes))
            {
                foreach ($episodes as $episode) {
                    $path=$episode->path();

                    $sitemap->add(url()->to($path),$episode->created_at ,'0.9','Weekly');
                }
            }

        }

        return $sitemap->render('xml');
    }

    public function pages()
    {
        $language=app()->getLocale();
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.page'.$language, 60);

        if(! $sitemap->isCached() ) {
            $episodes = Page::whereLang($language)->latest()->get();
            if (!empty($episodes))
            {
                foreach ($episodes as $episode) {
                    $path=$episode->path();

                    $sitemap->add(url()->to($path),$episode->created_at ,'0.9','Weekly');
                }
            }

        }

        return $sitemap->render('xml');
    }
}
