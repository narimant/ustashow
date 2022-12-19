<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Episode extends Model
{
    use SoftDeletes;
    protected $guarded=[];



    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function path()
    {
        $local=app()->getLocale();

        if(array_key_exists($local,config('app.locales')))
        {
            return "/$local/courses/{$this->course->slug}/episode/{$this->id}";
        }else
        {
            return "/courses/{$this->course->slug}/episode/{$this->id}";
        }
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function download()
    {
        if(! auth()->check()) return '#';

        $status = false;
        switch ($this->type) {
            case 'free' :
                $status = true;
                break;
            case 'vip' :
                if(user()->isActive()) $status = true;
                break;
            case 'cash' :
                if(user()->checkLearning($this->course)) $status = true;
                break;
        }
        $timestamp = Carbon::now()->addHours(5)->timestamp;
        $hash = Hash::make('fds@#T@#56@sdgs131fasfq' . $this->id . request()->ip() . $timestamp);

        return $status ? "/download/$this->id?mac=$hash&t=$timestamp" : "#";
    }



    public function scopeStatus($query,$status =true)
    {
        return $query->where('status', $status);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }



    public function seoData($value='seoTitle')
    {
        if($value=='seoTitle')
        {
            if($this->seoTitle != null)
            {
                return $this->seoTitle;
            }else
            {
                return  $this->title;
            }

        }elseif($value=='seoDescription')
        {
            if($this->seoDescription != null)
            {
                return $this->seoDescription;
            }else
            {
                return  $this->description;
            }
        }elseif ($value=='seoKeyword')
        {
            if($this->seoKeyword != null)
            {
                return $this->seoKeyword;
            }else
            {

                $keyword='';
                $i=0;
                foreach($this->tags()->get() as $tag)
                {

                    if($i==0)
                    {
                        $keyword=$tag->name;
                    }else
                    {
                        $keyword=$keyword.' , '.$tag->name;
                    }
                    $i++;

                }

                return $keyword ;
            }
        }
    }
}
