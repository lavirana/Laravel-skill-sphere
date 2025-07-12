<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Events\MessageSent;

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
    public function index()
    {
        $all_categories = Category::with('subcategories')->get();
        $categories = Category::with('courses')->get();
        return view('welcome', compact('all_categories','categories'));
    }
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        // This will broadcast the message to frontend
        broadcast(new MessageSent($message))->toOthers();
        return response()->json(['success' => true]);
    }

    public function show()
    {
        $all_categories = Category::with('subcategories')->get();
        return view('home', compact('all_categories'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $categories = Category::with(['courses' => function ($q) use ($query) {
            $q->where('title', 'like', "%$query%");
        }])->get();
        return view('search_results', compact('categories'))->render();
    }
    
}
