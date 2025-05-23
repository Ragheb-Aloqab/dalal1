<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
     // Display a listing of the sliders
     public function index()
     {
         $sliders = Slider::all();
         return view('admin.sliders.index', compact('sliders'));
     }

     // Show the form for creating a new slider
     public function create()
     {
         return view('admin.sliders.create');
     }

     // Store a newly created slider in storage
     public function store(Request $request)
     {
         $request->validate([
             'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'title' => 'required|string|max:255',
             'description' => 'nullable|string',
         ]);

         // Handle file upload
         if ($request->hasFile('path')) {
             $path = $request->file('path')->store('sliders', 'public');
         }

         // Create new slider
         Slider::create([
             'path' => $path ?? '',
             'title' => $request->input('title'),
             'description' => $request->input('description'),
         ]);

         return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
     }

     // Display the specified slider
     public function show(Slider $slider)
     {
         return view('admin.sliders.show', compact('slider'));
     }

     // Show the form for editing the specified slider
     public function edit(Slider $slider)
     {
         return view('admin.sliders.edit', compact('slider'));
     }

     // Update the specified slider in storage
     public function update(Request $request, Slider $slider)
     {
         $request->validate([
             'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'title' => 'required|string|max:255',
             'description' => 'nullable|string',
         ]);

         // Handle file upload
         if ($request->hasFile('path')) {
             // Delete old file if it exists
             if ($slider->path && Storage::disk('public')->exists($slider->path)) {
                 Storage::disk('public')->delete($slider->path);
             }
             $path = $request->file('path')->store('sliders', 'public');
         } else {
             $path = $slider->path; // Keep the old path
         }

         // Update slider
         $slider->update([
             'path' => $path,
             'title' => $request->input('title'),
             'description' => $request->input('description'),
         ]);

         return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
     }

     // Remove the specified slider from storage
     public function destroy(Slider $slider)
     {
         // Delete the image file from storage
         if (Storage::disk('public')->exists($slider->path)) {
             Storage::disk('public')->delete($slider->path);
         }

         // Delete the slider record
         $slider->delete();

         return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
     }
}
