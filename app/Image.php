<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getCommentsPaginatedAttribute()
    {
        return $this->comments()->orderBy('created_at', 'desc')->simplePaginate(10);
    }
}
