<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->paginate(20);
        return view('Admin.users.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

       $user->name=$request->name;
       if($request->level=='admin')
       {
           $user->roles()->sync(2);
           $user->level="admin";
       }else
       {
           $user->roles()->detach(2);
           $user->level="user";
       }

       if($request->password != null)
       {
           $user->password =Hash::make($request->password );
       }
       $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }




    public function myProfile()
    {
        return view('Admin.users.myprofile');
    }





    public function userImage(Request $request)
    {
        $user=user::find(auth()->user()->id);

        $files=$request->file('images');
        $inputs=$request->all();

        if($files)
        {

            $inputs['images']=$this->uploadimage($files);

        }
        else
        {
            $inputs['images']=$user->image;
            $inputs['images']['tumbnail']=$inputs['imagesThumb'];
        }

        unset($inputs['imagesThumb']);
        $user->image= $inputs['images'];
        $user->save();

        return redirect(route('users.profile'));
    }


    protected  function uploadimage($file)
    {
        $year=Carbon::now()->year;
        $uploadurl="/upload/users/{$year}";
        $filename=$file->getClientOriginalName();

        $image=$file->move(public_path($uploadurl),$filename);

        //resize image of orginal image
        $size=[300,600,900];
        $url['images']=$this->resizeimage($image->getRealPath(),$size,$uploadurl,$filename);
        $url['tumbnail']=$url['images'][$size[0]];

        return $url;

    }



    /*
    * resize image with intervention image madoule
    */
    private  function resizeimage($url,$size,$imagepath,$filename)
    {
        $image['orginal']=$imagepath.'/'.$filename;

        foreach ($size as $value)
        {
            $image[$value]=$imagepath.'/'.$value.'_'.$filename;
            Image::make($url)->resize($value, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path( $image[$value]));

        }
        return $image;
    }
}
