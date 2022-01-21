<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    public function Articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
