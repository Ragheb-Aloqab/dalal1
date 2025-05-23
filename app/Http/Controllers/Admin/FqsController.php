<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fqs;
use Illuminate\Http\Request;

class FqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fqs = Fqs::all();
        return view('admin.fqs.index', compact('fqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Fqs::create([
            'question'=>$request->input('question'),
            'answer' =>$request->input('answer')
        ]);
        
        return redirect()->route('admin.fqs.index')->with('success', 'تم إضافة السؤال بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fqs = Fqs::findOrFail($id);
        return view('admin.fqs.show', compact('fqs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fqs = Fqs::findOrFail($id);
        return view('admin.fqs.edit', compact('fqs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $fqs = Fqs::findOrFail($id);
        $fqs->update($request->all());

        return redirect()->route('admin.fqs.index')->with('success', 'تم تحديث السؤال بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fqs = Fqs::findOrFail($id);
        $fqs->delete();

        return redirect()->route('admin.fqs.index')->with('success', 'تم حذف السؤال بنجاح.');
    }
}
