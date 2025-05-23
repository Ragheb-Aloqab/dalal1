<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $helps = Help::all();
        return view('admin.helps.index', compact('helps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.helps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'type' =>'required|string'
        ]);

        Help::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.helps.index')
                         ->with('success', 'تم إنشاء المساعدة بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $help = Help::findOrFail($id);
        return view('admin.helps.show', compact('help'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $help = Help::findOrFail($id);
        return view('admin.helps.edit', compact('help'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
             'type' =>'required|string'
        ]);

        $help = Help::findOrFail($id);
        $help->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.helps.index')
                         ->with('success', 'تم تحديث المساعدة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $help = Help::findOrFail($id);
        $help->delete();

        return redirect()->route('admin.helps.index')
                         ->with('success', 'تم حذف المساعدة بنجاح.');
    }
}
