<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Models\Category;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('courses')->get();
    
        $groupedCourses = [];
        foreach ($categories as $category) {
            if ($category->courses->count() > 0) {
                $groupedCourses[$category->name] = $category->courses;
            }
        }
    
        return response()->json([
            'status' => true,
            'data' => $groupedCourses,
            'message' => 'All Course Data',
        ], 200);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
