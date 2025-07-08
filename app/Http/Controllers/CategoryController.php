<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    

    public function index()
    {
        // This method can be used to display a list of categories
        // You can fetch categories from the database and return a view
        $categories = category::all(); // Assuming you have a Category model
        return view('categories.index', compact('categories'));
    }

    public function category_courses($id){
        // This method can be used to display courses under a specific category
        // Fetch the category and its courses from the database
        $category_courses = category::with('courses')->findOrFail($id);
        
        // You can also fetch all categories if needed
        $all_categories = category::with('subcategories')->get();
        
        // Return a view with the category and its courses
        return view('courses', compact('category_courses', 'all_categories'));
    }


}
