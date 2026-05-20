<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Viewcontroller extends Controller
{
    public function dashboard(Request $request)
    {
        // If Ajax request → return only the content section (no layout)
        if ($request->ajax()) {
            return view('page.dashboard');
        }
        // Normal request → return full layout
        return view('page.dashboard');
    }

    public function project(Request $request)
    {
        if ($request->ajax()) {
            return view('page.project');
        }
        return view('page.project');
    }

    public function profile(Request $request)
    {
        if ($request->ajax()) {
            return view('profile.index');
        }
        return view('profile.index');
    }



}
