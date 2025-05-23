<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conditions = Condition::all();
        return view('admin.conditions.index', compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Condition::create($request->all());

        return redirect()->route('admin.conditions.index')->with('success', 'تم إضافة المحتوى بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $condition = Condition::findOrFail($id);
        return view('admin.conditions.show', compact('condition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $condition = Condition::findOrFail($id);
        return view('admin.conditions.edit', compact('condition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $condition = Condition::findOrFail($id);
        $condition->update($request->all());

        return redirect()->route('admin.conditions.index')->with('success', 'تم تحديث المحتوى بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $condition = Condition::findOrFail($id);
        $condition->delete();

        return redirect()->route('admin.conditions.index')->with('success', 'تم حذف المحتوى بنجاح.');
    }
}
