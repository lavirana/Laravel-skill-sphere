<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $all_courses = Course::where('user_id', Auth::id())->get();
        return view('admin.courses.index', ['courses' => $all_courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::where('status', 'active')->get();
        return view('admin.courses.add_course',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
         ]);

         $path = $request->file('image')->store('course_thumbnails', 'public');

        // Here you would typically save the course to the database
        // For example:

         Course::create([
            'title' => $request->title,
            'description' => $request->description,
             'price' => $request->price,
             'user_id' => Auth::id(),
             'category_id' => $request->category_id,
             'image' => $path,
         ]);
        // For now, we'll just return a success message

         return redirect()->route('courses')->with('success', 'Course added successfully.');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return view('admin.courses.course_detail', compact('id', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.courses.edit_course', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
