<?php

namespace App\Http\Controllers\Front;


use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;


class CategoryController extends Controller
{

        static $categoryids=[];
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $local=app()->getLocale();


        $categorychilds= $this->categoryTree($category->id);


        $articles=$category->articles()->OrwhereIn('categoryables.category_id',$categorychilds)->latest()->paginate(15);


        /*
        * seo strat
        */
        SEOMeta::setTitle($category->seoData('seoTitle'));
        SEOMeta::setDescription($category->seoData('seoDescription'));
        SEOMeta::addKeyword($category->seoData('seoKeyword'));

        OpenGraph::setTitle($category->seoData('seoTitle'));
        OpenGraph::setDescription($category->seoData('seoDescription'));
        OpenGraph::setUrl($_SERVER['HTTP_HOST'].$category->path());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::setSiteName(\env('APP_NAME'));
        OpenGraph::addProperty('locale', $local);

        $categoryslug=$category->slug;
        SEOTools::setCanonical($_SERVER['HTTP_HOST'].$category->path());









           return view('frontend.categorypagearticle',compact('articles','categoryslug','category'));


           // return view('frontend.categorypagecourse',compact('courses','categoryslug'));


    }

//this method for fech child category id of parent id and return array result
    private function categoryTree($parent_id , $sub_mark = ''){
        global $categoryids;

        //$query = $db->query("SELECT * FROM categories WHERE parent_id = $parent_id ORDER BY name ASC");
          $query=Category::where('parent_id',$parent_id)->get();

        //return $query;
        if (!$query->isEmpty() )
        {
            foreach ($query as $value){

                if($value->parent_id!=null){
                    $categoryids[]=$value->id;
                    $this->categoryTree($value->id);
                }
            }

        }else
        {
            $categoryids=[$parent_id];
        }

        return $categoryids;
    }

}
