<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{

    use Sluggable;
    protected $fillable=[
        'name',
        'color',
        'category_mode',
        'parent_id',
        'lang',
        'seoTitle',
        'seoDescription',
        'seoKeyword',
        'status',
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
        $local=app()->getLocale();

        if(array_key_exists($local,config('app.locales')))
        {
            return "/$local/category/$this->slug";
        }else
        {
            return "/category/$this->slug";
        }
    }



    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categoryable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function courses()
    {
        return $this->morphedByMany(Course::class, 'categoryable');
    }


    public function sub_category()
    {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function childrenRecursive() {
        return $this->sub_category()->with('childrenRecursive');
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
