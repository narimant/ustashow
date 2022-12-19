<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable=[
        'user_id',
        'parent_id',
        'status',
        'comment',
        'commentable_id',
        'commentable_type',
    ];


    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class,'parent_id','id')->where('status',1)->latest();
    }
}
