<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // استرجاع جميع السجلات من جدول Setting مع استبعاد created_at و updated_at
        $settings = Setting::select('id', 'name', 'value')->get(); // اختر الحقول التي تريدها فقط

        // إرجاع استجابة JSON تحتوي على قائمة بالسجلات
        return response()->json([
            'data' => $settings,
        ]); // 200 هو رمز الحالة لنجاح العملية
    }


}