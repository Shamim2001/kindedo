<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::latest()->paginate(10);
        return view('backend.promo.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.promo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max: 255',
            'excerpt' => 'nullable|string',
            'description' => 'nullable',
            'video_url' => 'nullable',
            'image' => 'required',
            'status' => 'required',
        ]);

        try {
            // image save
            $image = null;
            if (!empty($request->file('image'))) {
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('promos', $image);
            }

            // Save the Promo
            Promo::create([
                'title'       => $request->title,
                'excerpt'     => $request->excerpt,
                'description' => $request->description,
                'video_url'   => $request->video_url,
                'image'       => $image,
                'status'      => $request->status ? 'active': 'inactive',
            ]);

            // Redirect
            return redirect()->route('promo.index')->with('success', 'Promo Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('promo.index')->with('error', $th->getMessage());
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
    public function edit(Promo $promo)
    {
        return view('backend.promo.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        // Validate the input
        $request->validate([
            'title'       => 'required|string|max: 255',
            'excerpt'     => 'nullable|string',
            'description' => 'nullable',
            'video_url'   => 'nullable',
            'status'      => 'nullable',
            'image'       => 'required',
        ]);

        try {
            // image save
            $image = $promo->image;
            if (!empty($request->file('image'))) {
                Storage::delete('promos/' . $image);
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('promos', $image);
            }

            // Save the Promo
            $promo->update([
                'title'       => $request->title,
                'excerpt'     => $request->excerpt,
                'description' => $request->description,
                'video_url'   => $request->video_url,
                'image'       => $image,
                'status'      => $request->status ? 'active': 'inactive',
            ]);

            // Redirect
            return redirect()->route('promo.index')->with('success', 'Promo updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('promo.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        try {
            if ($promo) {
                Storage::delete('promos/' . $promo->image);

                $promo->delete();
            }

            // Redirect
            return redirect()->route('promo.index')->with('success', 'Promo deleted Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('promo.index')->with('error', $th->getMessage());
        }
    }
}
