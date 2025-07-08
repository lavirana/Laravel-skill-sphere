<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CourseSearchController extends Controller
{
    public function index()
    {
        $categories = Category::with('courses')->get();
        return view('test_ajax', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $categories = Category::with(['courses' => function ($q) use ($query) {
            $q->where('title', 'like', "%$query%");
        }])->get();

        return view('search_results', compact('categories'))->render();
    }
}
