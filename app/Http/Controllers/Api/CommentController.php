<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    // عرض جميع التعليقات الخاصة بالإعلان
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments, 200);
    }

    // عرض تعليق معين
    public function show($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'التعليق غير موجود'], 404);
        }

        return response()->json($comment, 200);
    }

    // إنشاء تعليق جديد
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'advertisement_id' => 'required|exists:advertisements,id',
                'content' => 'required|string',
            ]);

            $newComment = Comment::create([
                'advertisement_id' => $validatedData['advertisement_id'],
                'user_id' => $request->user()->id,
                'content' => $validatedData['content'],
            ]);

            return response()->json($newComment, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // تحديث تعليق موجود
    public function update(Request $request, $id)
    {
        $comment = Comment::where('user_id', Auth::id())->find($id);

        if (!$comment) {
            return response()->json(['message' => 'التعليق غير موجود'], 404);
        }

        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->content = $validatedData['content'];
        $comment->save();

        return response()->json($comment, 200);
    }

    // حذف تعليق
    public function destroy($id)
    {
        $comment = Comment::where('user_id', Auth::id())->find($id);

        if (!$comment) {
            return response()->json(['message' => 'التعليق غير موجود'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'تم حذف التعليق بنجاح'], 200);
    }
}