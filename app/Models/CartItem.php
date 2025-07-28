<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    protected  $fillable = ['user_id', 'course_id','status', 'price'];


    public function courses(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
