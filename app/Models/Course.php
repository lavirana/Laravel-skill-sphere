<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'user_id',
        'category_id',
        'image',
    ];

    public function category(){
        return $this->belongsTo(category::class, 'category_id');
    }
}
