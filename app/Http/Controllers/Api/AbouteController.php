<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AbouteController extends Controller
{
    public function index()
    {
        // استرجاع جميع السجلات من جدول About مع استبعاد created_at و updated_at
        $aboutItems = About::select('id', 'title', 'content')->get(); // اختر الحقول التي تريدها فقط

        // إرجاع استجابة JSON تحتوي على قائمة بالسجلات
        return response()->json([
            'data' => $aboutItems,
        ]); // 200 هو رمز الحالة لنجاح العملية
    }


}