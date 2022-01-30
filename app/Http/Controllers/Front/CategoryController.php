<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $articles=$category->articles()->latest()->get();
        $courses=$category->courses()->latest()->get();
        if($articles->count()>0)
        {
            return view('frontend.categorypagearticle',compact('articles'));
        }else
        {
            return view('frontend.categorypagecourse',compact('courses'));
        }

    }


}
