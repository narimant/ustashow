<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\episode;
use App\Http\Requests\EpisodeRequest;
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
        $episodes=episode::latest()->paginate(20);
        return view('Admin.episode.all',compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.episode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $episode=Episode::create($request->all());
        $this->setCourseTime($episode);
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
        return view('Admin.episode.edit',['episode'=>$episode]);
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
        $episode->update($request->all());
        $this->setCourseTime($episode);
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
        return redirect(route('episodes.index'));
    }
}
