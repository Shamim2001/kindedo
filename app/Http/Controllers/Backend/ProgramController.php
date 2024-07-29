<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::latest()->paginate(10);
        return view('backend.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max: 255',
            'title' => 'nullable|string|max: 255',
            'subtitle' => 'nullable|string',
            'excerpt' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'required|image',
        ]);

        try {
            // Save the main image
            $image = null;
            if (!empty($request->file('image'))) {
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('programs', $image);
            }

            // Save the program data
            $program = Program::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image' => $image,
                'excerpt' => $request->excerpt,
                'description' => $request->description,
            ]);

            // Save the gallery image
            if (!empty($request->file('gallery'))) {
                foreach ($request->file('gallery') as $item) {
                    $img = getImageName($item->getClientOriginalName());
                    $item->storeAs('gallery', $img);
                    Gallery::create([
                        'name' => $img,
                        'program_id' => $program->id,
                    ]);
                }
            }

            // Redirect
            return redirect()->route('program.index')->with('success', 'Program created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('program.index')->with('error', $th->getMessage());
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
    public function edit(Program $program)
    {
        return view('backend.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max: 255',
            'title' => 'nullable|string|max: 255',
            'subtitle' => 'nullable|string',
            'excerpt' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        try {
            // Save the main image
            $image = $program->image;
            if (!empty($request->file('image'))) {
                Storage::delete('programs/' . $image);
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('programs', $image);
            }

            // Save the program data
            $program->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image' => $image,
                'excerpt' => $request->excerpt,
                'description' => $request->description,
            ]);


            // Save the gallery image
            if (!empty($request->file('gallery'))) {
                foreach ($request->file('gallery') as $item) {
                    $img = getImageName($item->getClientOriginalName());
                    $item->storeAs('gallery', $img);
                    Gallery::create([
                        'name' => $img,
                        'program_id' => $program->id,
                    ]);
                }
            }

            // Redirect
            return redirect()->route('program.index')->with('success', 'Program updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('program.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        try {
            if ($program) {
                Storage::delete('programs/' . $program->image);

                $program->delete();
            }

            // Redirect
            return redirect()->route('program.index')->with('success', 'Program deleted Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('program.index')->with('error', $th->getMessage());
        }
    }
}
