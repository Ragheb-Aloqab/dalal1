<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like; // تأكد من إضافة هذا السطر لاستيراد الموديل
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function likeAdvertisement(Request $request)
    {
        $advertisementId = $request->input('advertisement_id');
        $userId = $request->input('user_id'); // يمكنك استخدام Auth::id() للحصول على ID المستخدم المسجل

        // تحقق مما إذا كان المستخدم قد أعجب بالإعلان بالفعل
        $like = Like::where('advertisement_id', $advertisementId)
            ->where('user_id', $userId)
            ->first();

        if ($like) {
            // إذا كان الإعجاب موجودًا، قم بإزالته (إلغاء الإعجاب)
            $like->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            // إذا لم يكن هناك إعجاب، أضف إعجابًا جديدًا
            Like::create(['advertisement_id' => $advertisementId, 'user_id' => $userId]);
            return response()->json(['status' => 'liked']);
        }
    }
    public function showlike($id)
    {
        // جلب بيانات العقار مع العلاقات المرتبطة به
        $realEstate = RealEstate::with(['realEstateable', 'features', 'attachments', 'advertisement'])
            ->findOrFail($id);

        // جلب بيانات المستخدم مع العلاقات المرتبطة (polymorphic و المدينة)
        $user = User::with(['userable', 'city'])->findOrFail($id); // افتراض أن الإعلان يحتوي على user_id أو provider_id

        // إرجاع البيانات باستخدام الـ Resources
        return response()->json([
            'realEstate' => $realEstate, // تحويل بيانات العقار باستخدام الـ Resource
            'user' => $user, // تحويل بيانات المستخدم باستخدام الـ Resource
        ]);
    }

}