<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
{
    $cartItems = CartItem::with(['courses', 'user'])
        ->where('status', 'pending')
        ->where('user_id', Auth::id())
        ->get();
    $all_categories = category::with('subcategories')->get();
    return view('cart', compact('cartItems', 'all_categories'));
}

    public function add(Request $request)
    {
        $existing = CartItem::where('user_id', $request->user_id)
            ->where('course_id', $request->course_id)
            ->where('status', 'pending')
            ->first();
    
        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Course already in cart'
            ], 400); // 400 = Bad Request
        }
    
        CartItem::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'price' => $request->price,
            'status' => 'pending',
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Course added to cart'
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    public function get_pending_count(Request $request)
    {
        $count = CartItem::where('user_id', $request->user_id)
            ->where('status', 'pending')
            ->count();

        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }

    public function check_course_exists(Request $request)
    {
        $exists = CartItem::where('user_id', $request->user_id)
            ->where('course_id', $request->course_id)
            ->where('status', 'pending')
            ->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
}
