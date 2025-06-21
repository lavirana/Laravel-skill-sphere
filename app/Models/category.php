<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\SubCategory;


class category extends Model
{
    protected $fillable = ['name', 'image'];

    public function courses()
{
    return $this->hasMany(Course::class, 'category_id');
}

public function subcategories()
{
    return $this->hasMany(SubCategory::class, 'category_id');
}


}
