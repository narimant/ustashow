<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PageController extends AdminController
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
            $page= Page::onlyTrashed()->latest()->paginate(20);
        }elseif(isset($show) && $show=='draft')
        {
            $page=Page::Status(false)->latest()->paginate(20);
        }else
        {
            $page=Page::Status()->latest()->paginate(20);
        }
        $trashcount=Page::onlyTrashed()->count();
        $draftcount=Page::Status(false)->count();
        return view('Admin.pages.all',['pages'=>$page,'trashcount'=>$trashcount,'draftcount'=>$draftcount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        /*
         * upload image
         */
        if($request->hasFile('images'))
        {
            $files=$request->file('images');
            $imagesUrl=$this->uploadimage($files);
        }else
        {
            $imagesUrl='';
        }



        /*
         * save data
         */
        auth()->user()->Pages()->create(array_merge($request->all() , [ 'images' => $imagesUrl ]));



        return redirect(route('pages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $Page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $Page)
    {

        return view('Admin.pages.edit',['page'=>$Page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $Page)
    {
        $files=$request->file('images');
        $inputs=$request->all();
        if($request->hasFile('images'))
        {
            if($files)
            {

                $inputs['images']=$this->uploadimage($files);

            }
            else
            {
                $inputs['images']=$Page->images;
                $inputs['images']['tumbnail']=$inputs['imagesThumb'];
            }
        }


        unset($inputs['imagesThumb']);







        if($inputs['slug'] != '' &&$Page->slug!= $inputs['slug'] )
        {
            $inputs['slug']=SlugService::createSlug(Page::class, 'slug', $inputs['slug']);

        }
        $Page->update($inputs);


        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $Page)
    {

        $Page->delete();
        return redirect()->back();
    }




    public function restore(int $id)

    {


        /**
         * Find content only among those deleted.
         */

        $article = Page::onlyTrashed()->findOrFail($id);

        $article->restore();

        return redirect()->back();

    }

    public function forceDelete( $id)
    {

        $article=Page::onlyTrashed()->findOrFail($id);
        $article->forceDelete();
        return redirect()->back();
    }

    public function publish($id)
    {

        $article=Page::findOrfail($id);
        $article->status=1;
        $article->update();
        return redirect()->back();
    }
}
