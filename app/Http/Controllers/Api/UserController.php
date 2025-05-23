<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function profile($id)
    // {
    //     // جلب بيانات العقار مع العلاقات المرتبطة به
    //     $realEstate = RealEstate::with(['realEstateable', 'features', 'attachments', 'advertisement'])
    //         ->findOrFail($id);

    //     // جلب بيانات المستخدم مع العلاقات المرتبطة (polymorphic و المدينة)
    //     $user = User::with(['userable', 'city'])->findOrFail($id); // افتراض أن الإعلان يحتوي على user_id أو provider_id

    //     // استبعاد الحقول غير المرغوب فيها من بيانات العقار
    //     $realEstate->makeHidden(['created_at', 'updated_at']);
    //     $realEstate->advertisement->makeHidden(['rating', 'created_at', 'updated_at']);

    //     // استبعاد الحقول غير المرغوب فيها من بيانات المستخدم
    //     $user->makeHidden(['avatar', 'created_at', 'updated_at']);

    //     // إرجاع البيانات باستخدام الـ Resources
    //     return response()->json([
    //         'realEstate' => $realEstate, // تحويل بيانات العقار باستخدام الـ Resource
    //         'user' => $user, // تحويل بيانات المستخدم باستخدام الـ Resource
    //     ]);
    // }

    public function getUserProfile(Request $request)
    {
        // تحقق مما إذا كان المستخدم مصادق عليه
        if (!$request->user()) {
            // إذا لم يكن هناك مستخدم مصادق عليه، إرجاع خطأ
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized access. Please log in.'
            ], 401);
        }

        // الحصول على المستخدم المصادق عليه
        $user = $request->user();

        // تحقق مما إذا كان المستخدم هو عميل باستخدام دالة isClient
        if ($user->isClient()) {
            return response()->json([
                'user' => $user // إرجاع بيانات المستخدم
            ], 200); // إضافة رمز حالة 200
        } else {
            // إذا كان المستخدم ليس عميلًا، إرجاع خطأ
            return response()->json([
                'status' => 'error',
                'message' => 'Access denied. This user type is not allowed.'
            ], 403);
        }
    }

    public function updateUserProfile(Request $request)
    {
        // التحقق مما إذا كان المستخدم مصادق عليه
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User is not authenticated.',
            ], 401);
        }

        // تحقق مما إذا كان المستخدم هو عميل باستخدام دالة isClient (إذا كانت مطلوبة)
        if (!$user->isClient()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Access denied. This user type is not allowed.',
            ], 403);
        }

        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'password' => 'nullable|string|min:8|confirmed', // تأكيد كلمة المرور إذا تم تقديمها
        ]);

        // تحديث بيانات المستخدم
        $user->name = $request->name;
        $user->email = $request->email;

        // التحقق من تقديم كلمة مرور جديدة وتحديثها
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        try {
            // حفظ التغييرات
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'User profile updated successfully.',
                'user' => $user, // إرجاع بيانات المستخدم المحدثة
            ], 200);

        } catch (\Exception $e) {
            // معالجة الأخطاء غير المتوقعة
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the profile. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function updateUserProfiles(Request $request)
    {
        // الحصول على المستخدم المصادق عليه باستخدام التوكن
        $user = $request->user();
    
        // التحقق مما إذا كان المستخدم مصادق عليه
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User is not authenticated.',
            ], 401);
        }
    
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // السماح باستخدام البريد الإلكتروني الحالي
            'password' => 'nullable|string|min:8', // كلمة المرور اختيارية، ويتم تحديثها فقط إذا تم إدخالها
        ]);
    
        // تحديث بيانات المستخدم
        $user->name = $request->name;
        $user->email = $request->email;
    
        // إذا تم إدخال كلمة مرور جديدة، تحديث كلمة المرور
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        // حفظ التغييرات في قاعدة البيانات
        $user->save();
    
        // إرجاع استجابة JSON توضح نجاح العملية
        return response()->json([
            'status' => 'success',
            'message' => 'User profile updated successfully.',
            'user' => $user // إرجاع بيانات المستخدم المحدثة
        ], 200);
    }
    
    // UserController.php
    public function deleteAccount(Request $request)
    {
        // الحصول على المستخدم المسجل حالياً
        $user = $request->user();

        // حذف المستخدم من قاعدة البيانات
        $user->delete();

        // تسجيل الخروج للمستخدم وحذف التوكن
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // إعادة توجيه المستخدم إلى صفحة تأكيد الحذف
        return response()->json([
            'message' => 'تم حذف الحساب بنجاح.',
        ], 200);
    }

}