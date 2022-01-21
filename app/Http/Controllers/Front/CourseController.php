<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Episode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function single(Course $course)
    {
        $comment=$course->comments()->where(['status'=>1,'parent_id'=>0])->latest()->with('comments')->get();
        return view('frontend.courses', compact('course','comment'));
    }


    public function download(Episode $episode)
    {
        $hash = 'fds@#T@#56@sdgs131fasfq' . $episode->id . \request()->ip() . \request('t');

        if(Hash::check($hash , \request('mac'))) {


                return response()->download(storage_path($episode->VideoUrl));


        } else {
            return 'لینک دانلود شما از کار افتاده است';
        }


    }
}
