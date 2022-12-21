<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Tag extends Model
{

    use Sluggable;
    protected $fillable=[
        'name','status','lang','seoTitle','seoDescription','seoKeyword'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function path()
    {
        $local = app()->getLocale();

        if (array_key_exists($local, config('app.locales'))) {
            return "/$local/tag/$this->slug";
        } else {
            return "/tag/$this->slug";
        }
    }
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function courses()
    {
        return $this->morphedByMany(Course::class, 'taggable');
    }

    public function episodes()
    {
        return $this->morphedByMany(Episode::class, 'taggable');
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
                return  $this->name;
            }

        }elseif($value=='seoDescription')
        {
            if($this->seoDescription != null)
            {
                return $this->seoDescription;
            }else
            {
                return  $this->name;
            }
        }elseif ($value=='seoKeyword')
        {
            if($this->seoKeyword != null)
            {
                return $this->seoKeyword;
            }else
            {
                return null;
            }
        }
    }
  
  
  
  
  
  
  
}
