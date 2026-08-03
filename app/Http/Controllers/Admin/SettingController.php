<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();

        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $setting->update($request->all());

        return back()->with('success', 'Data sekolah berhasil diperbarui');
    }
}