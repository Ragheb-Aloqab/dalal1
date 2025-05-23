<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attachments = Attachment::all();
        return view('admin.attachments.index', compact('attachments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attachments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_path' => 'required|string|max:255',
            'file_type' => 'required|string|max:50',
            'attachable_id' => 'required|integer',
            'attachable_type' => 'required|string',
        ]);

        Attachment::create($request->all());

        return redirect()->route('admin.attachments.index')->with('success', 'تم إنشاء المرفق بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attachment = Attachment::findOrFail($id);
        return view('admin.attachments.show', compact('attachment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attachment = Attachment::findOrFail($id);
        return view('admin.attachments.edit', compact('attachment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'file_path' => 'required|string|max:255',
            'file_type' => 'required|string|max:50',
            'attachable_id' => 'required|integer',
            'attachable_type' => 'required|string',
        ]);

        $attachment = Attachment::findOrFail($id);
        $attachment->update($request->all());

        return redirect()->route('admin.attachments.index')->with('success', 'تم تحديث المرفق بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attachment = Attachment::findOrFail($id);
        $attachment->delete();

        return redirect()->route('admin.attachments.index')->with('success', 'تم حذف المرفق بنجاح.');
    }
}
