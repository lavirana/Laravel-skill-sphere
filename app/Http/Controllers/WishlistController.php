<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    
public function index()
{
    $user = auth()->user();
    $wishlists = Wishlist::where('user_id', $user->id)->with(['course','user'])->get();
    $all_categories = category::with('subcategories')->get();
    return view('wishlist', compact('wishlists','all_categories'));
}


public function toggle(Request $request)
{
    $user = auth()->user();
    $courseId = $request->course_id;

    $existing = Wishlist::where('user_id', $user->id)
        ->where('course_id', $courseId)
        ->first();

    if ($existing) {
        $existing->delete();
        return response()->json(['status' => 'removed']);
    } else {
        Wishlist::create([
            'user_id' => $user->id,
            'course_id' => $courseId
        ]);
        return response()->json(['status' => 'added']);
    }
}
}
