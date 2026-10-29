<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate();
        return view('settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrCreate();
        $setting->dark_mode = $request->input('dark_mode', false);
        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully');
    }
}