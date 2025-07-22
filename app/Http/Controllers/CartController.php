<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
}
