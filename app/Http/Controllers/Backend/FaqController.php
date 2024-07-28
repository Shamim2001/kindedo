<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('backend.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max: 255',
            'title' => 'required|string|max: 255',
            'content' => 'nullable|string',
            'status' => 'nullable',
            'image' => 'required',
        ]);

        try {
            // image save
            $image = null;
            if (!empty($request->file('image'))) {
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('faqs', $image);
            }

            // Save the Faq
            Faq::create([
                'title' => $request->title,
                'name' => $request->name,
                'content' => $request->content,
                'image' => $image,
                'status' => $request->status ? 'active' : 'inactive',
            ]);

            // Redirect
            return redirect()->route('faq.index')->with('success', 'Faq created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('faq.index')->with('error', $th->getMessage());
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
    public function edit(Faq $faq)
    {
        return view('backend.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        // Validate the input
        $request->validate([
            'name'    => 'required|string|max: 255',
            'title'   => 'required|string|max: 255',
            'content' => 'nullable|string',
            'status'  => 'nullable',
            'image'   => 'required',
        ]);

        try {
            // image save
            $image = $faq->image;
            if (!empty($request->file('image'))) {
                Storage::delete('faqs/' . $image);
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('faqs', $image);
            }

            // Save the Faq
            $faq->update([
                'title'   => $request->title,
                'name'    => $request->name,
                'content' => $request->content,
                'image'   => $image,
                'status'  => $request->status ? 'active': 'inactive',
            ]);

            // Redirect
            return redirect()->route('faq.index')->with('success', 'Faq updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('faq.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        try {
            if ($faq) {
                Storage::delete('faqs/' . $faq->image);
                // delete faq
                $faq->delete();
            }

            // Redirect
            return redirect()->route('faq.index')->with('success', 'Faq deleted Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('faq.index')->with('error', $th->getMessage());
        }
    }
}
