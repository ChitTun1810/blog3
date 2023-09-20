<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $name = $request->name;
        if(!$name) return response(['msg'=>'name required'], 400);

        $category = new Category;
        $category->name = $name;
        $category->save();

        return $category;
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $name = $request->name;
        if (!$name) return response(['msg' => 'name required'], 400);
        $category->name = $name;
        $category->save();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $category;
    }
}
