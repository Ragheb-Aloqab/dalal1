<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings',
            'value' => 'required|string',
        ]);

        Setting::create([
            'type'=>'test settings',
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Setting created successfully.');
    }

    public function show(string $id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.show', compact('setting'));
    }

    public function edit(string $id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,' . $id,
            'value' => 'required|string',
        ]);

        $setting = Setting::findOrFail($id);
        $setting->update([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully.');
    }

    public function destroy(string $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index')->with('success', 'Setting deleted successfully.');
    }
}
