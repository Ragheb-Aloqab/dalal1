<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Request; // اسم الموديل
use Illuminate\Http\Request as HttpRequest; // لتجنب التداخل في الأسماء
use Illuminate\Support\Facades\Auth;
class RequestController extends Controller
{
    // عرض جميع الطلبات
    public function index()
    {
        $requests = Request::where('user_id', Auth::id())->get(); // عرض الطلبات الخاصة بالمستخدم الحالي
        return response()->json($requests, 200); // إرجاع الطلبات على هيئة JSON
    }

    // عرض طلب واحد
    public function show($id)
    {
        $request = Request::where('user_id', Auth::id())->find($id);

        if (!$request) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        return response()->json($request, 200);
    }

    // إنشاء طلب جديد
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // إنشاء السجل الجديد في قاعدة البيانات
        $userRequest =Request::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        // إرجاع استجابة JSON تحتوي على البيانات الجديدة
        return response()->json([
            'message' => 'تم إنشاء الطلب بنجاح.',
            'data' => $userRequest
        ], 201);
    }


    // تحديث حالة الطلب
    public function update(HttpRequest $request, $id)
    {
        $requestToUpdate = Request::where('user_id', Auth::id())->find($id);

        if (!$requestToUpdate) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        $validatedData = $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
        ]);

        $requestToUpdate->status = $validatedData['status'];
        $requestToUpdate->save();

        return response()->json($requestToUpdate, 200);
    }

    // حذف الطلب
    public function destroy($id)
    {
        $request = Request::where('user_id', Auth::id())->find($id);

        if (!$request) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        $request->delete();

        return response()->json(['message' => 'تم حذف الطلب بنجاح'], 200);
    }
}