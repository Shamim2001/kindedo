<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('backend.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('backend.course.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name'       => 'required|string|max: 255',
            'description' => 'nullable',
            'start_time'  => 'nullable',
            'end_time'    => 'nullable',
            'pdf'         => 'nullable',
            'image'       => 'required',
            'teacher'     => 'required',
        ]);

        try {
            // image save
            $image = null;
            if (!empty($request->file('image'))) {
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('courses', $image);
            }


            // Store Pdf
            $pdf = null;
            if (!empty($request->file('pdf'))) {
                $pdf = getImageName($request->file('pdf')->getClientOriginalName());
                $request->file('pdf')->storeAs('courses', $pdf);
            }

            // Save the Course
            Course::create([
                'name'       => $request->name,
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'start_time'  => $request->start_time,
                'end_time'    => $request->end_time,
                'video_url'   => $request->video_url,
                'image'       => $image,
                'pdf'         => $pdf,
                'teacher_id'  => $request->teacher,
            ]);

            // Redirect
            return redirect()->route('course.index')->with('success', 'Course Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('course.index')->with('error', $th->getMessage());
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
    public function edit(Course $course)
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('backend.course.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // Validate the input
        $request->validate([
            'name'       => 'required|string|max: 255',
            'description' => 'nullable',
            'start_time'  => 'nullable',
            'end_time'    => 'nullable',
            'pdf'         => 'nullable',
            'image'       => 'required',
            'teacher'     => 'required',
        ]);

        try {
            // image save
            $image = $course->image;
            if (!empty($request->file('image'))) {
                Storage::delete('courses/' . $image);
                $image = getImageName($request->file('image')->getClientOriginalName());
                $request->file('image')->storeAs('courses', $image);
            }


            // Store Pdf
            $pdf = $course->pdf;
            if (!empty($request->file('pdf'))) {
                Storage::delete('courses/' . $pdf);
                $pdf = getImageName($request->file('pdf')->getClientOriginalName());
                $request->file('pdf')->storeAs('courses', $pdf);
            }

            // Save the Course
            $course->update([
                'name'       => $request->name,
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'start_time'  => $request->start_time,
                'end_time'    => $request->end_time,
                'video_url'   => $request->video_url,
                'image'       => $image,
                'pdf'         => $pdf,
                'teacher_id'  => $request->teacher,
            ]);

            // Redirect
            return redirect()->route('course.index')->with('success', 'Course updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('course.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            if ($course) {
                Storage::delete('courses/' . $course->image);
                Storage::delete('courses/' . $course->pdf);

                $course->delete();
            }

            // Redirect
            return redirect()->route('course.index')->with('success', 'Course deleted Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('course.index')->with('error', $th->getMessage());
        }
    }
}
