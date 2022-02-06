<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
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

//    public function getRouteKeyName()
//    {
//        return "slug";
//    }

    public function path()
    {
        return "/course/$this->slug";
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
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
        return $this->morphToMany(tag::class, 'taggable');
    }


    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }


    public function scopeStatus($query,$status =true)
    {
        return $query->where('status', $status);
    }
}
