<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;


class ArticleController extends AdminController
{

        public function __construct()
        {



        }

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
            $articles= Article::onlyTrashed()->latest()->paginate(20);
        }elseif(isset($show) && $show=='draft')
        {
            $articles=Article::Status(false)->latest()->paginate(20);
        }else
        {
            $articles=Article::Status()->latest()->paginate(20);
        }
        $trashcount=Article::onlyTrashed()->count();
        $draftcount=Article::Status(false)->count();
      return view('Admin.articles.all',['articles'=>$articles,'trashcount'=>$trashcount,'draftcount'=>$draftcount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltags=Tag::all();
        return view('Admin.articles.create',compact('alltags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
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
        $newarticle=auth()->user()->article()->create(array_merge($request->all() , [ 'images' => $imagesUrl ]));
        $newarticle->categories()->sync($category);
        if ( !empty($allTagfind))
        {
            $newarticle->tags()->sync($allTagfind);
        }



        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        dd($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $alltags=Tag::all();
        $tags=$article->tags;
        $articletagsids=[];
        if (!empty($tags))
        {
            foreach($tags as $tag)
            {
                $articletagsids[]=$tag->id;
            }
        }


        return view('Admin.articles.edit',compact('article','alltags','articletagsids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {

        $files=$request->file('images');
        $inputs=$request->all();

        if($files)
        {

            $inputs['images']=$this->uploadimage($files);

        }
        else
        {
            $inputs['images']=$article->images;
            $inputs['images']['tumbnail']=$inputs['imagesThumb'];
        }

        unset($inputs['imagesThumb']);

        /****
         * unset category ids of request for add or update article
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


        if($inputs['slug'] != '' &&$article->slug!= $inputs['slug'] )
        {
            $inputs['slug']=SlugService::createSlug(Article::class, 'slug', $inputs['slug']);

        }
        $article->update($inputs);
        $article->categories()->sync($category);
        $article->tags()->sync($allTagfind);
        return redirect(route('articles.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back();
    }




    public function restore(int $id)

    {

        /**
         * Find content only among those deleted.
         */

        $article = Article::onlyTrashed()->findOrFail($id);

        $article->restore();

        return redirect()->back();

    }

    public function forceDelete( $id)
    {
            $article=Article::onlyTrashed()->findOrFail($id);
       $article->forceDelete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $article=Article::findOrfail($id);
        $article->status=1;
        $article->update();
        return redirect()->back();
    }
}
