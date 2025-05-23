<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\Setting;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        // استرجاع جميع السجلات من جدول Help مع استبعاد created_at و updated_at
        $helpItems = Help::select('id', 'title', 'content')->get(); // اختر الحقول التي تريدها فقط
    
        // إرجاع استجابة JSON تحتوي على قائمة بالسجلات
        return response()->json([
            'data' => $helpItems,
        ]); // 200 هو رمز الحالة لنجاح العملية
    }
    

}