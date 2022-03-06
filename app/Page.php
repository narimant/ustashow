<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $guarded=[];
    protected $casts=[
        'images'=>'array',

    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'           => false,
            ],

        ];
    }

    public function scopeStatus($query,$status =true)
    {
        return $query->where('status', $status);
    }

    public function path()
    {
        $local=app()->getLocale();

        if(array_key_exists($local,config('app.locales')))
        {
            return "/$local/page/$this->slug";
        }else
        {
            return "page/$this->slug";
        }



    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
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
