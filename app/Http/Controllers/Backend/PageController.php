<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.page.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title'       => 'required|string|max: 255',
            'description' => 'nullable',
            'video_url'   => 'nullable',
            'image'       => 'required',
            'status'      => 'required',
            'category'    => 'required|exists:categories,id',
        ]);

        try {
            // image save
            $image = null;
            if (!empty($request->file('image'))) {
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('pages', $image);
            }

            // Save the Page
            Page::create([
                'title'       => $request->title,
                'description' => $request->description,
                'video_url'   => $request->video_url,
                'image'       => $image,
                'status'      => $request->status ? 'active': 'inactive',
                'category_id' => $request->category,
            ]);

            // Redirect
            return redirect()->route('page.index')->with('success', 'Page Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('page.index')->with('error', $th->getMessage());
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
    public function edit(Page $page)
    {
        $categories = Category::get();
        return view('backend.page.edit', compact('page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        // Validate the input
        $request->validate([
            'title'       => 'required|string|max: 255',
            'description' => 'nullable',
            'video_url'   => 'nullable',
            'status'      => 'nullable',
            'image'       => 'required',
            'category'    => 'required',
        ]);

        try {
            // image save
            $image = $page->image;
            if (!empty($request->file('image'))) {
                Storage::delete('pages/' . $image);
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('pages', $image);
            }

            // Save the Page
            $page->update([
                'title'       => $request->title,
                'excerpt'     => $request->excerpt,
                'description' => $request->description,
                'video_url'   => $request->video_url,
                'image'       => $image,
                'status'      => $request->status ? 'active': 'inactive',
                'category_id' => $request->category,
            ]);

            // Redirect
            return redirect()->route('page.index')->with('success', 'Page updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('page.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        try {
            if ($page) {
                Storage::delete('pages/' . $page->image);

                $page->delete();
            }

            // Redirect
            return redirect()->route('page.index')->with('success', 'Page deleted Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('page.index')->with('error', $th->getMessage());
        }
    }
}
