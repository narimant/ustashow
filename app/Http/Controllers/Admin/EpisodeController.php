<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Course;
use App\Http\Controllers\Controller;
use App\Episode;
use App\Http\Requests\EpisodeRequest;
use App\Tag;
use Illuminate\Http\Request;

class EpisodeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show=\request()->get('show');
        if(isset($show) && $show=='trash')
        {
            $episodes= Episode::onlyTrashed()->latest()->paginate(20);
        }elseif(isset($show) && $show=='draft')
        {
            $episodes=Episode::Status(false)->latest()->paginate(20);
        }else
        {
            $episodes=Episode::Status()->latest()->paginate(20);
        }
        $trashcount=Episode::onlyTrashed()->count();
        $draftcount=Episode::Status(false)->count();

        return view('Admin.episode.all',['episodes'=>$episodes,'trashcount'=>$trashcount,'draftcount'=>$draftcount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltags=Tag::all();
        return view('Admin.episode.create',compact('alltags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
       * start work on tags
       */

        $allTagfind=$this->checktags($request->tags);
        unset($request['tags']);
        /*
         * end wor
         *
         */
        $episode=Episode::create($request->all());
        $this->setCourseTime($episode);
        $episode->tags()->sync($allTagfind);
        return redirect(route('episodes.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(episode $episode)
    {
        $alltags=Tag::all();
        $tags=$episode->tags;
        $articletagsids=[];
        foreach($tags as $tag)
        {
            $articletagsids[]=$tag->id;
        }

        return view('Admin.episode.edit',compact('episode','alltags','articletagsids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodeRequest $request, episode $episode)
    {
        $inputs=$request->all();
        /****
         * start work on tags
         */

        $allTagfind=$this->checktags($request->tags);
        unset($inputs['tags']);
        /*
         * end work on tags
         */


        $episode->update($inputs);
        $this->setCourseTime($episode);


        $episode->tags()->sync($allTagfind);
        return redirect(route('episodes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */



    public function destroy(episode $episode)
    {
        $episode->delete();
        return redirect()->back();
    }




    public function restore(int $id)

    {

        /**
         * Find content only among those deleted.
         */

        $episode = Episode::onlyTrashed()->findOrFail($id);

        $episode->restore();

        return redirect()->back();

    }

    public function forceDelete( $id)
    {
        $episode=Episode::onlyTrashed()->findOrFail($id);
        $episode->forceDelete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $episode=Episode::findOrfail($id);
        $episode->status=1;
        $episode->update();
        return redirect()->back();
    }
}
