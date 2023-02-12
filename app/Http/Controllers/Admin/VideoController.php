<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Video;
use App\Tag;
use App\Http\Requests\videoRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class videoController extends AdminController
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
            $videos= video::onlyTrashed()->latest()->paginate(20);
        }elseif(isset($show) && $show=='draft')
        {
            $videos=video::Status(false)->latest()->paginate(20);
        }else
        {
            $videos=video::Status()->latest()->paginate(20);
        }
        $trashcount=video::onlyTrashed()->count();
        $draftcount=video::Status(false)->count();
        return view('Admin.videos.all',['videos'=>$videos,'trashcount'=>$trashcount,'draftcount'=>$draftcount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltags=Tag::all();
        return view('Admin.videos.create',compact('alltags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(videoRequest $request)
    {


        /*
         * upload image
         */
        $files=$request->file('images');
        $imagesUrl=$this->uploadimage($files);



        /*
         * start work on tags
         */
        if ($request->tags !=null)
        {
            $allTagfind=$this->checktags($request->tags);
            unset($request['tags']);
        }

        /*
         * end work on tags
         */




        /*
         * start work on category
         */
        $category=Category::find($request->category);
        unset($request['category']);
        /*
         * end work on category
         */


        /*
         * save data
         */
        $newvideo=auth()->user()->video()->create(array_merge($request->all() , [ 'images' => $imagesUrl ]));
        $newvideo->categories()->sync($category);
        if ( !empty($allTagfind))
        {
            $newvideo->tags()->sync($allTagfind);
        }



        return redirect(route('videos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        dd($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video)
    {
        $alltags=Tag::all();
        $tags=$video->tags;
        $videotagsids=[];
        foreach($tags as $tag)
        {
            $videotagsids[]=$tag->id;
        }

        return view('Admin.videos.edit',compact('video','alltags','videotagsids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(videoRequest $request, video $video)
    {

        $files=$request->file('images');
        $inputs=$request->all();

        if($files)
        {

            $inputs['images']=$this->uploadimage($files);

        }
        else
        {
            $inputs['images']=$video->images;
            $inputs['images']['tumbnail']=$inputs['imagesThumb'];
        }

        unset($inputs['imagesThumb']);

        /****
         * unset category ids of request for add or update video
         * and set request category in category argument for sync with category tables
         */
        $category=Category::find($request->category);
        unset($inputs['category']);


        /****
         * start work on tags
         */
        if(!empty($request->tags))
        {
            $allTagfind=$this->checktags($request->tags);
            unset($inputs['tags']);
        }else
        {
            $allTagfind=[];
        }

        /*
         * end work on tags
         */


        if($inputs['slug'] != '' &&$video->slug!= $inputs['slug'] )
        {
            $inputs['slug']=SlugService::createSlug(video::class, 'slug', $inputs['slug']);

        }
        $video->update($inputs);
        $video->categories()->sync($category);
        $video->tags()->sync($allTagfind);
        return redirect(route('videos.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        $video->delete();
        return redirect()->back();
    }




    public function restore(int $id)

    {

        /**
         * Find content only among those deleted.
         */

        $video = video::onlyTrashed()->findOrFail($id);

        $video->restore();

        return redirect()->back();

    }

    public function forceDelete( $id)
    {
        $video=video::onlyTrashed()->findOrFail($id);
        $video->forceDelete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $video=video::findOrfail($id);
        $video->status=1;
        $video->update();
        return redirect()->back();
    }
}
