<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::latest()->paginate(10);
        return view('backend.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'gallery' => 'required',
        ]);

        try {
            if (!empty($request->file('gallery'))) {
                foreach ($request->file('gallery') as $key => $image) {
                    $img = getImageName($image->getClientOriginalName());
                    $image->storeAs('gallery', $img);
                    Gallery::create([
                        'name' => $img,
                    ]);
                }
            }
            return redirect()->route('gallery.index')->with('success', 'Gallery created successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        // Validation
        $request->validate([
            'gallery' => 'required',
        ]);

        try {
            if (!empty($request->file('gallery'))) {
                foreach ($request->file('gallery') as $key => $image) {
                    Storage::delete('gallery/' . $gallery->name);
                    $gallery->delete();
                    $img = getImageName($image->getClientOriginalName());
                    $image->storeAs('gallery', $img);
                    Gallery::create([
                        'name' => $img,
                    ]);
                }
            }

            return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        try {
            Storage::delete('gallery/' . $gallery->name);
            $gallery->delete();

            return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
