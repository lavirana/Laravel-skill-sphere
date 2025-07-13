<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show_create_post(){
        return view('create_post');
    }
    public function create_post(Request $request){
         $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' =>  Str::slug($request->input('title')),
            'user_id' => 2
         ]);

        PostPublished::dispatch($post); // 🔔 this triggers the listeners
return back()->with('success', 'Post created successfully. An email notification has been sent to the admin.');
    }

    
    public function create(){
$post = Post::create([
            'title' => 'My 15th Post',
            'description' => 'This is the content of my post.',
            'image' => '1750487793.png',
            'slug' => 'my-post-slug15',
            'user_id' => 3
        ]);
            $post->tags()->attach(6);

            event(new UserRegistered($post)); // 🔔 this triggers the listener

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

    public function edit(Post $post)
    {
        $this->authorize('edit-post', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('edit-post', $post);
        
        $post->update($request->only(['title', 'description', 'image', 'slug']));
        
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }


}
