<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use App\Models\User;
use App\Notifications\SystemNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class ProfileUserAndProvider extends Controller
{
    public function profiles(Request $request)
    {
        // التأكد من أن التوكن صحيح والمستخدم مسجل
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // جلب بيانات المستخدم مع العلاقات المرتبطة (polymorphic و city)
        $user->load(['userable', 'city']);

        // إرجاع البيانات باستخدام الـ JSON response
        return response()->json([
            'user' => $user, // إرجاع بيانات المستخدم مع العلاقات
        ]);
    }

}