<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\Client;
use App\Models\User;
// use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // استيراد Mail
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function getUser(Request $request): JsonResponse
    {
        $user = Auth::user();
        return response()->json(['success' => true, 'user' => $user], 200);
    }

    public function register(Request $req)
    {
        // تعريف القواعد
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Rules\Password::defaults()],
            'phone' => ['required', 'string'],
            'city_id' => 'required|exists:cities,id', // تأكد من استخدام 'city_id'
        ];
    
        // التحقق من المدخلات
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400); // إرجاع الأخطاء إذا وجدت
        }
    
        // إنشاء العميل
        $client = Client::create();
    
        // إنشاء المستخدم
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'city_id' => $req->city_id, // تأكد من أن المدينة تستخدم city_id
            'password' => Hash::make($req->password), // تأمين كلمة المرور
            'userable_id' => $client->id,
            'userable_type' => Client::class,
        ]);
    
        // إنشاء توكن للمستخدم
        $token = $user->createToken('Personal Access Token')->plainTextToken;
    
        // إرجاع المستخدم والتوكن
        return response()->json(['user' => $user, 'token' => $token], 201);
    }
    
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'city_id' => 'required|exists:cities,id',
            'password' => 'required|string|min:8|confirmed', // تأكيد كلمة المرور مع الحد الأدنى
        ]);

        // إنشاء المستخدم
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // تشفير كلمة المرور
            'phone' => $request->input('phone'),
            'city_id' => $request->input('city_id'),
            'userable_type' => 'App\Models\Provider',  // نوع الكيان المرتبط
            'userable_id' => 1,  // معرف الكيان المرتبط (مثلاً: معرف Provider)
        ]);

        // إرجاع استجابة JSON توضح نجاح العملية
        return response()->json([
            'message' => 'User created successfully.',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token], 200);
        }

        return response()->json(['message' => 'Incorrect email or password'], 400);
    }
    public function logout(Request $request)
    {
        // احذف الـ token الحالي للمستخدم
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'تم تسجيل الخروج بنجاح'], 200);
    }

    // public function sendVerificationCode(Request $request)
    // {
    //     $request->validate(['email' => 'required|email']);

    //     $user = User::where('email', $request->email)->first();
    //     if ($user) {
    //         // توليد رمز التحقق
    //         $user->generateVerificationCode();

    //         // إرسال البريد الإلكتروني باستخدام الـ Mailable
    //         Mail::to($user->email)->send(new VerificationCodeMail($user->verification_code));

    //         return response()->json(['message' => 'Verification code sent successfully'], 200);
    //     } else {
    //         return response()->json(['error' => 'User not found'], 404);
    //     }



    // }

    // public function verify(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'verification_code' => 'required|string',
    //     ]);

    //     $user = User::where('email', $request->email)
    //         ->where('verification_code', $request->verification_code)
    //         ->first();

    //     if ($user) {
    //         $user->email_verified_at = now();
    //         $user->save();
    //         return response()->json(['message' => 'Email verified successfully'], 200);
    //     } else {
    //         return response()->json(['error' => 'Invalid verification code'], 400);
    //     }
    // }
}