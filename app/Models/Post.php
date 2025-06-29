<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'image', 'slug', 'user_id'];


    public function latestComment(){
        return $this->morphOne(comment::class, 'commenta')->latestOfMany();
    }

    public function comments(){
        return $this->morphMany(comment::class, 'commentable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
