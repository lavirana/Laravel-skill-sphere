<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::all();
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'All Post Data',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatePost = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,gif|max:2048', // Added max size validation
            ]
        );
        if ($validatePost->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validatePost->errors()->all()
            ], 401);
        }


        $img = $request->image;
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path() . '/uploads', $imageName);

        $posts = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName, // Store the image in the 'posts' directory
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Post Created Successfully',
            'data' => $posts
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['post'] = Post::select(
            'id',
            'title',
            'description',
            'image'
        )->where(['id' => $id])->get();

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Your single Post',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatePost = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,gif|max:2048', // Added max size validation
            ]
        );
        if ($validatePost->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validatePost->errors()->all()
            ], 401);
        }


        $post = Post::select('id', 'image')->get();

        if ($request->image != '') {
            $path = public_path() . '/uploads';
            if ($post->image != '' && $post->image != null) {
                $old_file = $path . $post->image;
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
            }
            $img = $request->image;
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img->move(public_path() . '/uploads', $imageName);
        } else {
            $imageName = $post->image;
        }
        $posts = Post::where(['id' => $id])->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName, // Store the image in the 'posts' directory
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Post Updated Successfully',
            'data' => $posts
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imagePath = Post::where('id', $id)->value('image');
        $filepath = public_path() . '/uploads'.$imagePath[0]['image'];
        unlink($filepath);
        $post = Post::where('id',$id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Post Deleted Successfully',
            'data' => $post
        ], 200);
    }
}
