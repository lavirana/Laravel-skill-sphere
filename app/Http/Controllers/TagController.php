<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags_posts = Tag::with("posts")->with('videos')->find(7);
        return $tags_posts;
    }
}
