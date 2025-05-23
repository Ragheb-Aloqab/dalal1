<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversations = Conversation::all();
        return view('admin.conversations.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch users to populate the form options
        $users = \App\Models\User::all();
        return view('admin.conversations.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id1' => 'required|exists:users,id',
            'user_id2' => 'required|exists:users,id',
        ]);

        $conversation = new Conversation();
        $conversation->user_id1 = $request->input('user_id1');
        $conversation->user_id2 = $request->input('user_id2');
        $conversation->save();

        return redirect()->route('admin.conversations.index')->with('success', 'تم إنشاء المحادثة بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conversation = Conversation::findOrFail($id);
        return view('admin.conversations.show', compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conversation = Conversation::findOrFail($id);
        // Fetch users to populate the form options
        $users = \App\Models\User::all();
        return view('admin.conversations.edit', compact('conversation', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id1' => 'required|exists:users,id',
            'user_id2' => 'required|exists:users,id',
        ]);

        $conversation = Conversation::findOrFail($id);
        $conversation->user_id1 = $request->input('user_id1');
        $conversation->user_id2 = $request->input('user_id2');
        $conversation->save();

        return redirect()->route('admin.conversations.index')->with('success', 'تم تحديث المحادثة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();

        return redirect()->route('admin.conversations.index')->with('success', 'تم حذف المحادثة بنجاح.');
    }
}
