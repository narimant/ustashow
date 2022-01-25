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
        return view('frontend.categorypage',compact('articles','courses'));
    }


}
