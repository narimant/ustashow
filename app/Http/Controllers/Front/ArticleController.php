<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function single(Article $article)
    {




        $related = Article::whereHas('tags', function ($q) use ($article) {
            return $q->whereIn('name', $article->tags->pluck('name'));
        })
            ->where('id', '!=', $article->id) // So you won't fetch same post
            ->get();

        $comment=$article->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();

        return view('frontend.article',compact('article','comment','related'));
    }

}
