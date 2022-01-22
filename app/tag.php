<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{

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
