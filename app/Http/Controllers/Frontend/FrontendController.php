<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    function home() : View {
        return view('frontend.home.index');
    }


    // Program Single
    function programDetails($program){
        $program = Program::where('slug', $program)->first();

        return view('frontend.program.single', compact('program'));
    }


    // Teachers
    function teachers() : View {
        $teachers = User::get();
        return view('frontend.teacher.index', compact('teachers'));
    }
}
