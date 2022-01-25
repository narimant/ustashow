<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Article extends Model
{
    use Sluggable;

    protected $guarded=[];
    protected $casts=[
        'images'=>'array',

    ];

   /* protected $attributes = [
        'CreateTimeDiff' => '0',
    ];*/
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function scopeSearch($query,$keyword)
    {
        return $query->where('title','LIKE','%'.$keyword.'%');
    }
    public function path()
    {
        $local=app()->getLocale();

        if(array_key_exists($local,config('app.locales')))
        {
            return "/$local/articles/$this->slug";
        }else
        {
            return "/articles/$this->slug";
        }



    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }




    public function getCreateTimeDiffAttribute()
    {
        $created = new Carbon($this->created_at);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days < 1)
            ? 'today'
            : $created->diffForHumans($now);




        return $difference;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }

}
