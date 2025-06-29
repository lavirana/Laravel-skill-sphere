<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function create(){
$post = Post::create([
            'title' => 'My 15th Post',
            'description' => 'This is the content of my post.',
            'image' => '1750487793.png',
            'slug' => 'my-post-slug15',
            'user_id' => 3
        ]);
            $post->tags()->attach(6);

        return $post;
    }

    public function index(){
        $posts = Post::with('latestComment')->get();
        return $posts;
    }

    public function show(){
        $post = Post::with('latestComment')->find(1);
        return $post;
    }


}
