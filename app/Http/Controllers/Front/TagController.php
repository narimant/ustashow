<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Tag;


class TagController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag,$type="article")
    {


        $articles=$tag->articles()->latest()->paginate(12);

        $courses=$tag->courses()->latest()->paginate(12);

        return view('frontend.tagpage',compact('articles','courses','tag','type'));
    }


}
