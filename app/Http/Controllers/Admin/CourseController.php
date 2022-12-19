<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Tag;
use Illuminate\Http\Request;

class CourseController extends AdminController
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
            $courses= Course::onlyTrashed()->latest()->paginate(20);
        }elseif(isset($show) && $show=='draft')
        {
            $courses=Course::Status(false)->latest()->paginate(20);
        }else
        {
            $courses=Course::Status()->latest()->paginate(20);
        }
        $trashcount=Course::onlyTrashed()->count();
        $draftcount=Course::Status(false)->count();



        return view('Admin.course.all',compact('courses','trashcount','draftcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltags=Tag::all();
        return view('Admin.course.create',compact('alltags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {

        $files=$request->file('images');
        $imagesUrl=$this->uploadimage($files);

        /*
        * start work on tags
        */

        $allTagfind=$this->checktags($request->tags);
        unset($request['tags']);
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


        $newcourse=auth()->user()->course()->create(array_merge($request->all() , [ 'images' => $imagesUrl]));
        $newcourse->categories()->sync($category);
        $newcourse->tags()->sync($allTagfind);
        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {



        $alltags=Tag::all();
        $tags=$course->tags;
        $articletagsids=[];
        foreach($tags as $tag)
        {
            $articletagsids[]=$tag->id;
        }

        return view('Admin.course.edit',compact('course','alltags','articletagsids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $files=$request->file('images');
        $inputs=$request->all();

        if($files)
        {

            $inputs['images']=$this->uploadimage($files);

        }
        else
        {
            $inputs['images']=$course->images;
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

        $allTagfind=$this->checktags($request->tags);
        unset($inputs['tags']);
        /*
         * end work on tags
         */


        $course->update($inputs);
        $course->categories()->sync($category);
        $course->tags()->sync($allTagfind);

        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */




    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back();
    }




    public function restore(int $id)

    {

        /**
         * Find content only among those deleted.
         */

        $course = Course::onlyTrashed()->findOrFail($id);

        $course->restore();

        return redirect()->back();

    }

    public function forceDelete( $id)
    {
        $course=Course::onlyTrashed()->findOrFail($id);
        $course->forceDelete();
        return redirect()->back();
    }

    public function publish($id)
    {
        $course=Course::findOrfail($id);
        $course->status=1;
        $course->update();
        return redirect()->back();
    }
}
