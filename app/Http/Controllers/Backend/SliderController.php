<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'btn_text' => 'required',
            'image'    => 'required',
            'status'   => 'required',
        ]);

        try {
            $image = null;

            if (!empty($request->file('image'))) {
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('sliders', $image);
            }

            // Save the slider
            Slider::create([
                'title'    => $request->title,
                'subtitle' => $request->subtitle,
                'btn_text' => $request->btn_text,
                'image'    => $image,
                'status'   => $request->status ? 'active': 'inactive',
            ]);

            // Redirect
            return redirect()->route('slider.index')->with('success', 'Slider Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('slider.index')->with('error', $th->getMessage());
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
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {

        // Validate the input
        $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'btn_text' => 'required',
            'image'    => 'nullable',
            'status'   => 'required',
        ]);

        try {
            $image = $slider->image;
            if (!empty($request->file('image'))) {
                Storage::delete('sliders/' . $image);
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('sliders', $image);
            }


            // Save the slider
            $slider->update([
                'title'    => $request->title,
                'subtitle' => $request->subtitle,
                'btn_text' => $request->btn_text,
                'image'    => $image,
                'status'   => $request->status ? 'active': 'inactive',
            ]);

            // Redirect
            return redirect()->route('slider.index')->with('success', 'Slider updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('slider.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try {
            if($slider) {
                Storage::delete('sliders/' . $slider->image);

                $slider->delete();
            }

            return redirect()->route('slider.index')->with('success', 'Slider deleted successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('slider.index')->with('error', $th->getMessage());
        }
    }
}
