<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class favoritesUserController extends Controller
{
    public function store( Request $request)
    {
        // التحقق من أن المستخدم مصادق عليه
        $user = $request->user();
        $advertisementId = $request->advertisement_id;
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401); // في حالة عدم مصادقة المستخدم
        }

        try {
            // البحث عن الإعلان باستخدام ID وإرجاع خطأ 404 إذا لم يتم العثور عليه
            $advertisement = Advertisement::findOrFail(id: $advertisementId);

            // التحقق من أن الإعلان ليس ملكًا للمستخدم نفسه
            if ($advertisement->user_id === $user->id) {
                return response()->json(['message' => 'You cannot favorite your own advertisement'], 400);
            }

            // التحقق مما إذا كان الإعلان موجودًا بالفعل في المفضلة
            if ($user->favoriteAdvertisements->contains($advertisement->id)) {
                return response()->json(['message' => 'Already favorited!'], 400); // الإعلان موجود بالفعل في المفضلة
            }

            // إضافة الإعلان إلى المفضلة
            $user->favoriteAdvertisements()->attach($advertisement->id);

            return response()->json(['message' => 'Advertisement added to favorites!'], 201); // تم الإضافة بنجاح

        } catch (\Exception $e) {
            // إرجاع رسالة خطأ تفصيلية في حالة حدوث خطأ
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }




    public function removeFavorite(Request $request)
    {
        // التحقق من أن المستخدم مصادق عليه
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // التحقق من البيانات المرسلة
        $request->validate([
            'advertisement_id' => 'required|exists:advertisements,id', // تحقق من وجود رقم الإعلان
        ]);

        $advertisementId = $request->advertisement_id;

        // التحقق مما إذا كان الإعلان موجودًا في المفضلة
        if ($user->favorites()->where('advertisement_id', $advertisementId)->exists()) {
            // إزالة الإعلان من المفضلة
            $user->favorites()->detach($advertisementId);
            return response()->json(['message' => 'Advertisement removed from favorites'], 200);
        }

        return response()->json(['message' => 'Advertisement not found in favorites'], 404); // إرجاع خطأ إذا لم يكن الإعلان موجودًا
    }
    public function getFavoriteAdvertisements(Request $request)
    {
        // التحقق من أن المستخدم مصادق عليه
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401); // في حالة عدم مصادقة المستخدم
        }

        try {
            // استرجاع جميع الإعلانات المفضلة للمستخدم
            $favorites = $user->favoriteAdvertisements;

            // إرجاع الإعلانات المفضلة مع حالة HTTP 200
            return response()->json($favorites, 200); // أعد قائمة الإعلانات المفضلة
        } catch (\Exception $e) {
            // إرجاع رسالة خطأ تفصيلية في حالة حدوث خطأ
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function isFavorite(Request $request)
    {
        // التحقق من أن المستخدم مصادق عليه
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401); // في حالة عدم مصادقة المستخدم
        }

        // التحقق من البيانات المرسلة
        $request->validate([
            'advertisement_id' => 'required|exists:advertisements,id', // تحقق من وجود رقم الإعلان
        ]);

        $advertisementId = $request->advertisement_id;

        // التحقق مما إذا كان الإعلان موجودًا في المفضلة
        if ($user->favoriteAdvertisements->contains($advertisementId)) {
            return response()->json(['is_favorite' => true], 200); // الإعلان مضاف إلى المفضلة
        }

        return response()->json(['is_favorite' => false], 200); // الإعلان غير مضاف إلى المفضلة
    }

}