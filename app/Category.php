<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use Sluggable;
    protected $fillable=[
        'name',
        'parent_id'
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
}
