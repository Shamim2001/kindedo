<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            // Create category
            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            // Redirect
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('category.index')->with('error', $th->getMessage());
        }
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
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            // Create category
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            // Redirect
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('category.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // Delete category
            $category->delete();

           // Redirect
           return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('category.index')->with('error', $th->getMessage());
        }
    }
}
