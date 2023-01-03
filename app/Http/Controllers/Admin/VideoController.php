<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use App\Tag;
use App\Http\Requests\VideoRequest;

class VideoController extends AdminController
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
            $Videos= Video::onlyTrashed()->latest()->paginate(20);
        }elseif(isset($show) && $show=='draft')
        {
            $Videos=Video::Status(false)->latest()->paginate(20);
        }else
        {
            $Videos=Video::Status()->latest()->paginate(20);
        }
        $trashcount=Video::onlyTrashed()->count();
        $draftcount=Video::Status(false)->count();
        return view('Admin.videos.all',['videos'=>$Videos,'trashcount'=>$trashcount,'draftcount'=>$draftcount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltags=Tag::all();
        return view('Admin.Videos.create',compact('alltags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
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
        $newVideo=auth()->user()->Video()->create(array_merge($request->all() , [ 'images' => $imagesUrl ]));
        $newVideo->categories()->sync($category);
        if ( !empty($allTagfind))
        {
            $newVideo->tags()->sync($allTagfind);
        }



        return redirect(route('Videos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $Video)
    {
        dd($Video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $Video)
    {
        $alltags=Tag::all();
        $tags=$Video->tags;
        foreach($tags as $tag)
        {
            $Videotagsids[]=$tag->id;
        }

        return view('Admin.Videos.edit',compact('Video','alltags','Videotagsids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, Video $Video)
    {

        $files=$request->file('images');
        $inputs=$request->all();

        if($files)
        {

            $inputs['images']=$this->uploadimage($files);

        }
        else
        {
            $inputs['images']=$Video->images;
            $inputs['images']['tumbnail']=$inputs['imagesThumb'];
        }

        unset($inputs['imagesThumb']);

        /****
         * unset category ids of request for add or update Video
         * and set request category in category argument for sync with category tables
         */
        $category=Category::find($request->category);
        unset($inputs['category']);


        /****
         * start work on tags
         */

        $allTagfind=$this->checktags($request->tags);
        unset($inputs['tags']);
        /*
         * end work on tags
         */


        if($inputs['slug'] != '' &&$Video->slug!= $inputs['slug'] )
        {
            $inputs['slug']=SlugService::createSlug(Video::class, 'slug', $inputs['slug']);

        }
        $Video->update($inputs);
        $Video->categories()->sync($category);
        $Video->tags()->sync($allTagfind);
        return redirect(route('Videos.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $Video)
    {
        $Video->delete();
        return redirect()->back();
    }




    public function restore(int $id)

    {

        /**
         * Find content only among those deleted.
         */

        $Video = Video::onlyTrashed()->findOrFail($id);

        $Video->restore();

        return redirect()->back();

    }

    public function forceDelete( $id)
    {
        $Video=Video::onlyTrashed()->findOrFail($id);
        $Video->forceDelete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $Video=Video::findOrfail($id);
        $Video->status=1;
        $Video->update();
        return redirect()->back();
    }
}
