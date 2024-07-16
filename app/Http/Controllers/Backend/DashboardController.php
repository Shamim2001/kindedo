<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index');
    }


    function programs() : View {
        return view('backend.program.index');
    }

    function faqs() : View {
        return view('backend.faq.index');
    }
}
