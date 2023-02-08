<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {


         //dd(auth()->users()->hasRole(Permission::whereName('show-article')->first()->roles));

        return view('Admin.panel');
    }

    protected  function uploadimage($file)
    {
        $year=Carbon::now()->year;
        $uploadurl="/upload/images/{$year}";
        $filename=$file->getClientOriginalName();	
      
      $image=$file->move(public_path($uploadurl),$filename);
		
        //resize image of orginal image
        $size=[300=>300,600=>400,900=>600];
        $url['images']=$this->resizeimage($image->getRealPath(),$size,$uploadurl,$filename);
        $url['tumbnail']=$url['images'][$size[300]];

        return $url;

    }

    protected function checktags($tags)
    {
        $tagArr=[];
        foreach ($tags as $tag) {
            if (is_numeric($tag)) {
                $tagArr[] = $tag;
            } else {
                $newTag = Tag::create(['name' => $tag,'status'=>1,'lang'=>app()->getLocale()]);
                $tagArr[] = $newTag->id;
            }
        }
        return Tag::find($tagArr);
    }



    /*
     * resize image with intervention image madoule
     */
    private  function resizeimage($url,$size,$imagepath,$filename)
    {
        $image['orginal']=$imagepath.'/'.$filename;

        foreach ($size as $width=>$height)
        {
            $image[$width]=$imagepath.'/'.$width.'_'.$filename;
            Image::make($url)->fit($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path( $image[$width]));

        }
        return $image;
    }


    protected function setCourseTime($episode)
    {
        $course=$episode->course;

        $course->time= $this->getCourseTime($course->episodes->pluck('time'));
        $course->save();

    }

    protected function getCourseTime($times)
    {

        $timestamp=Carbon::parse('00:00:00');
        foreach ($times as $t)
        {
            $time=strlen($t)==5 ? strtotime('00:'.$t) : strtotime($t);
            $timestamp->addSecond($time);
        }
        return $timestamp->format('H:i:s');
    }

}
