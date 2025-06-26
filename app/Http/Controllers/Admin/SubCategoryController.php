<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {      
         // This method should ideally fetch sub-categories from the database
        //$sub_categories = SubCategory::find($id);
        $category = category::findOrFail($id);
        return view('admin.sub_categories.index', compact('id','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $category = category::findOrFail($id);
        return view('admin.sub_categories.add_sub_category',compact('id','category'));
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
