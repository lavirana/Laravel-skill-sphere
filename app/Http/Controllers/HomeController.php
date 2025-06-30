<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_categories = Category::with('subcategories')->get();
        return view('welcome', compact('all_categories'));
    }

    public function show()
    {
        $all_categories = Category::with('subcategories')->get();
        return view('home', compact('all_categories'));
    }
    
}
