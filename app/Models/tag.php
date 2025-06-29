<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['id','name'];

    public function  posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }
    public function  videos(){
        return $this->morphedByMany(Video::class, 'taggable');
    }


}
