<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{

    protected $fillable = ['comment', 'user_id', 'commentable_id', 'commentable_type'];

    public function commentable(){
        return $this->morphTo();
    }
}
