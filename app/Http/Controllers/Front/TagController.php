<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {

        $articles=$tag->articles()->latest()->get();
        $courses=$tag->courses()->latest()->get();
        return view('frontend.tagpage',compact('articles','courses'));
    }


}
