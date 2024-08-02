<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index() {
        $setting = Setting::first();
        return view('backend.setting.index', compact('setting'));
    }


    function update(Request $request): mixed
    {
        // Validation
        $request->validate([
            'site-title'       => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'copyright'        => 'nullable|string|max:255',
            'since'            => 'nullable|string|max:255',
            'address'          => 'nullable|string|max:255',
            'phone'            => 'nullable|string|max:50',
        ]);

        try {
            $setting = Setting::first();
            // main logo
            $main_logo = $setting->main_logo;
            if (!empty($request->file('main_logo'))) {
                $main_logo = getImageName($request->file('main_logo')->getClientOriginalName());
                $request->file('main_logo')->storeAs('setting', $main_logo);
            }
            // Footer Logo
            $footer_logo = $setting->footer_logo;
            if (!empty($request->file('footer_logo'))) {
                $footer_logo = getImageName($request->file('footer_logo')->getClientOriginalName());
                $request->file('footer_logo')->storeAs('setting', $footer_logo);
            }
            // Favicon
            $favicon = $setting->favicon;
            if (!empty($request->file('favicon'))) {
                $favicon = getImageName($request->file('favicon')->getClientOriginalName());
                $request->file('favicon')->storeAs('setting', $favicon);
            }


            // Social Media
            $social_media = [];

            foreach ($request->social_name as $key => $name) {
                if (!empty($name)) {
                    $social_media[] = [
                        'name' => $name,
                        'url'  => $request->social_url[$key],
                    ];
                }
            }


            // Update Setting
            $setting->update([
                'main_logo'        => $main_logo,
                'footer_logo'      => $footer_logo,
                'favicon'          => $favicon,
                'site_title'       => $request->site_title,
                'site_description' => $request->site_description,
                'since'            => $request->since,
                'address'          => $request->address,
                'phone'            => $request->phone,
                'support'          => $request->support,
                'copyright'        => $request->copyright,
                'social_media'        => json_encode($social_media),
            ]);

            // Return redirect
            return redirect()->back()->with('success', 'Setting updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
