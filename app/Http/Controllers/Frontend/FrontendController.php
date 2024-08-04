<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    function home() : View {
        $setting = Setting::first();
        return view('frontend.home.index', compact('setting'));
    }


    // Programs
    function programs(){

        return view('frontend.program.index');
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


    // Teachers
    function contact() : View {
        return view('frontend.contact.index');
    }

    // About
    function about() : View {
        return view('frontend.about.index');
    }

    // message Management
    function messageManagement() : View {
        return view('frontend.about.message');
    }

    // message governing Body
    function governingBody() : View {
        return view('frontend.about.governing-body');
    }
}
