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


    public function imageUpload(Request $request)
     {
         $mainImage = $request->file('file');
         $filename = str_replace(' ', '-', time() . '--' . $mainImage->getClientOriginalName());

         $mainImage->move('tinymce_upload/', $filename);
         return json_encode(["location" => env('APP_URL') .'/tinymce_upload/' . $filename]);
     }


    function programs() : View {
        return view('backend.program.index');
    }

    function faqs() : View {
        return view('backend.faq.index');
    }

    function promo() : View {
        return view('backend.promo.index');
    }
}
