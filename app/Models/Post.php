<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


#[ObservedBy([PostObserver::class])]
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

    protected static function booted():void{
    {
        static::addGlobalScope('userdetail',function(Builder $builder){
                $builder->where('role' , 'user');
        });
    }
}
}
