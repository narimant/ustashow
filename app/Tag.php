<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use Sluggable;
    protected $fillable=[
        'name'
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
}
