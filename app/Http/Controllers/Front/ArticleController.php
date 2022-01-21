<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function single(Article $article)
    {

        $comment=$article->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();
        return view('frontend.article',compact('article','comment'));
    }

}
