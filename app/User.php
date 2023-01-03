<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','viptime'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'image'=>'array',
    ];

    public function course()
    {
        return $this->hasMany(Course::class);
    }


    public function article()
    {
       return $this->hasMany(Article::class);
    }
    public function video()
    {
        return $this->hasMany(Video::class);
    }
    public function Pages()
    {
        return $this->hasMany(Page::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('name' , $role);
        }
//
//        foreach ($role as $r) {
//            if($this->hasRole($r->name)) {
//                return true;
//            }
//        }
//        return false;

        return !! $role->intersect($this->roles)->count();
    }

    public function isVip()
    {

      return $this->viptime >Carbon::now() ? true : false ;
    }
    public function isAdmin()
    {
        return $this->level =='admin' ? true : false ;
    }

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function checkLearn($course)
    {

        return !! Learn::where('user_id' , $this->id)->where('course_id' , $course->id)->first();
    }

    public function userimage($size='thumbnail')
    {
        if($this->image==null)
        {
            return asset('upload/users/default/default.png');
        }
        else
        {
            switch ($size)
            {
                case 'thumbnail':
                    return $this->image['tumbnail'];
                    break;
                case '300':
                    return $this->image['images']['300'];
                    break;
                case '600':
                    return $this->image['images']['600'];
                    break;
                case '900':
                    return $this->image['images']['900'];
                    break;
                case 'orginal':
                    return $this->image['orginal'];
                    break;
            }


        }

    }
}
