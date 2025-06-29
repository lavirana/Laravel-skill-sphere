<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{

    protected $table = 'video'; // Specify the table name if it differs from the model name

    protected $fillable = ['title', 'description', 'image', 'slug', 'user_id'];

    public function comments(){
        return $this->morphMany(comment::class, 'commentable');
    }


    public function oldestComment(){
        return $this->morphOne(comment::class, 'commentable')->oldestOfMany();
    }

    public function latestComment(){
        return $this->morphOne(comment::class, 'commentable')->latestOfMany();
    }

    public function bestComment(){
        return $this->morphOne(comment::class, 'commentable')->ofMany('likes', 'max')->latest();
    }


    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }  
}
