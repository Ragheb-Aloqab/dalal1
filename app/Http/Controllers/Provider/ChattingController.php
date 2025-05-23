<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ChattingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all conversations
        $conversations = Conversation::with(['user1', 'user2'])->get();
        // return response($conversations);
        return view('provider.chats.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Display form to start a new conversation
        return view('provider.chats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id1' => 'required|exists:users,id',
            'user_id2' => 'required|exists:users,id',
        ]);

        // Create a new conversation
        $conversation = Conversation::create([
            'user_id1' => $request->input('user_id1'),
            'user_id2' => $request->input('user_id2'),
        ]);

        return redirect()->route('provider.chats.index')->with('success', 'Conversation started successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the conversation and its messages
        $conversation = Conversation::with('messages')->findOrFail($id);

        return view('provider.chats.show', compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Display form to edit a conversation (if needed)
        $conversation = Conversation::findOrFail($id);

        return view('provider.chats.edit', compact('conversation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'user_id1' => 'required|exists:users,id',
            'user_id2' => 'required|exists:users,id',
        ]);

        // Find and update the conversation
        $conversation = Conversation::findOrFail($id);
        $conversation->update([
            'user_id1' => $request->input('user_id1'),
            'user_id2' => $request->input('user_id2'),
        ]);

        return redirect()->route('provider.chats.index')->with('success', 'Conversation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the conversation
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();

        return redirect()->route('provider.chats.index')->with('success', 'Conversation deleted successfully.');
    }

    /**
     * Store a new message in a conversation.
     */
    public function sendMessage(Request $request, string $conversationId)
    {
        // Validate the request data
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'content' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        // Handle file upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('messages', 'public');
        }

        // Create a new message
        $message = Message::create([
            'conversation_id' => $conversationId,
            'sender_id' => $request->input('sender_id'),
            'receiver_id' => $request->input('receiver_id'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('provider.chats.show', $conversationId)->with('success', 'Message sent successfully.');
    }
}
