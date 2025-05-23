<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RealEstateResource;
use App\Http\Resources\UserResource;
use App\Models\RealEstate;
use App\Models\User;

use Illuminate\Http\Request as HttpRequest; // لتجنب التداخل في الأسماء
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealEstateController extends Controller
{
    public function show($id)
    {
        // استرجاع الـ RealEstate بناءً على الـ ID الخاص به مع جميع العلاقات المطلوبة
        $realEstate = RealEstate::with(['realEstateable', 'features', 'attachments'])
            ->findOrFail($id);

        // معالجة البيانات مع الفلترة وإضافة روابط الصور للمرفقات
        if ($realEstate) {
            // تعديل مرفقات العقار لإضافة روابط الصور
            $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                // هنا نضيف رابط لكل صورة
                $attachment->file_path = url(Storage::url($attachment->file_path));
                return $attachment;
            });

            // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable (إذا كان هناك حقل غير مرغوب فيه، يمكن استبعاده هنا)
            // $realEstate->realEstateable->unset('unwanted_field'); // مثال على استبعاد حقل

            // استرجاع المستخدم المرتبط بـ RealEstate
            $user = User::with('userable', 'city')
                ->where('id', $id) // تعديل للتأكد من استرجاع المستخدم المرتبط بالعقار
                ->firstOrFail();

            // إرجاع البيانات بصيغة JSON
            return response()->json([
                'realEstate' => $realEstate,
                'user' => $user,
            ]);
        }

        // في حالة عدم العثور على العقار، يمكنك إرجاع خطأ (اختياري)
        return response()->json(['error' => 'Real estate not found'], 404);
    }


    public function showAll()
    {
        // جلب جميع العقارات مع العلاقات المطلوبة
        $realEstates = RealEstate::with(['realEstateable', 'features', 'attachments'])
            ->get()
            ->filter(function ($realEstate) {
                return $realEstate !== null; // استبعاد القيم null
            })
            ->map(function ($realEstate) {
                // تعديل مرفقات العقار لإضافة روابط الصور
                $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                    // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                    // هنا نضيف رابط لكل صورة
                    $attachment->file_path = url(Storage::url($attachment->file_path));

                    return $attachment;
                });

                // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable


                return $realEstate;
            });

        // جلب جميع المستخدمين مع العلاقات المطلوبة (مثال: userable, city)
        $users = User::with(['userable', 'city'])
            ->whereHas('userable', function ($query) {
                $query->where('userable_type', 'App\\Models\\Provider'); // استعلام لجلب المزودين فقط
            })
            ->get()
        ;
        // إرجاع البيانات بصيغة JSON مع العقارات والمستخدم المحدد
        return response()->json([
            'realEstates' => $realEstates, // بيانات العقارات
            'users' => $users, // بيانات المستخدم المحدد
        ]);
    }



    public function showAllSaless()
    {
        // جلب جميع العقارات التي حالتها "بيع" مع العلاقات المطلوبة
        $realEstates = RealEstate::with(['realEstateable', 'features', 'attachments'])
            ->where('status', 'sale') // تصفية العقارات التي حالتها بيع
            ->get()
            ->filter(function ($realEstate) {
                return $realEstate !== null; // استبعاد القيم null
            })
            ->map(function ($realEstate) {
                // تعديل مرفقات العقار لإضافة روابط الصور
                $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                    // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                    // هنا نضيف رابط لكل صورة
                    $attachment->file_path = url(Storage::url($attachment->file_path));

                    return $attachment;
                });

                // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable


                return $realEstate;
            });

        // جلب جميع المستخدمين مع العلاقات المطلوبة (مثال: userable, city)
        $users = User::with(['userable', 'city'])
            ->get()
        ;

        // إرجاع البيانات بصيغة JSON مع العقارات والمستخدمين
        return response()->json([
            'realEstates' => $realEstates, // بيانات العقارات
            'users' => $users, // بيانات المستخدمين
        ]);
    }

    public function index()
    {
        $reals = RealEstate::with(['realEstateable', 'advertisement'])->get(); // Get all real estate listings
        return view('admin.real-estates.index', compact(var_name: 'reals'));
    }
    public function store(HttpRequest $request)
    {
        $realEstate = RealEstate::create([
            'city_id' => $request->city_id,
            'description' => $request->description,
            'boundaries' => $request->boundaries,
            'location' => $request->location,
            'price' => $request->price,
            'status' => $request->status,
            'commercial_number' => $request->commercial_number,
            'real_estateable_type' => $request->real_estateable_type,
            'real_estateable_id' => $request->real_estateable_id,
        ]);

        return response()->json(['message' => 'Real estate saved successfully!'], 200);
    }


    // public function searchrealestates(Request $request)
    // {
    //     // الحصول على نص البحث من الطلب
    //     $search = $request->input('search');

    //     // جلب العقارات مع تطبيق عوامل تصفية البحث
    //     $properties = RealEstate::where(function ($query) use ($search) {
    //         if (!empty($search)) {
    //             // البحث في خصائص مختلفة
    //             $query->where('description', 'like', '%' . $search . '%') // البحث في وصف العقار
    //                 ->orWhere('location', 'like', '%' . $search . '%') // البحث في الموقع
    //                 ->orWhere('price', 'like', '%' . $search . '%') // البحث في السعر
    //                 ->orWhere('status', 'like', '%' . $search . '%'); // البحث في الحالة
    //         }
    //     })
    //         ->with(['realEstateable', 'features', 'attachments', 'advertisement']) // تحميل العلاقات المطلوبة
    //         ->get()
    //         ->filter(function ($property) {
    //             return $property !== null && $property->attachments->isNotEmpty(); // استبعاد القيم null والصور الفارغة
    //         })
    //         ->map(function ($property) {
    //             // إخفاء حقل access من علاقة realEstateable
    //             if ($property->relationLoaded('realEstateable') && $property->realEstateable) {
    //                 $property->realEstateable->makeHidden(['access']);
    //             }

    //             // إخفاء حقل rating من علاقة advertisement
    //             if ($property->relationLoaded('advertisement') && $property->advertisement) {
    //                 $property->advertisement->makeHidden(['rating']);
    //             }

    //             // إرجاع العقار بعد إجراء التعديلات
    //             return $property;
    //         });

    //     // جلب المستخدمين
    //     $users = User::with(['userable', 'city'])
    //         ->get()
    //         ->filter(function ($user) {
    //             return $user !== null; // استبعاد القيم null
    //         })
    //         ->map(function ($user) {
    //             // إخفاء الحقول المحددة من علاقة userable
    //             if ($user->relationLoaded('userable') && $user->userable) {
    //                 $user->userable->makeHidden(['personal_id_image', 'commercial_certificate_image', 'access']);
    //             }

    //             // إخفاء الحقول من المستخدم
    //             return $user->makeHidden(['email_verified_at', 'avatar', 'access']);
    //         });

    //     // التحقق من وجود نتائج
    //     if ($properties->isEmpty() && $users->isEmpty()) {
    //         // إرجاع رسالة عند عدم العثور على بيانات
    //         return response()->json([
    //             'message' => 'لا توجد نتائج تطابق البحث',
    //             'realEstates' => [], // إرجاع قائمة فارغة للعقارات
    //             'users' => [] // إرجاع قائمة فارغة للمستخدمين
    //         ]);
    //     }

    //     // إرجاع البيانات بصيغة JSON مع العقارات والمستخدمين
    //     return response()->json([
    //         'realEstates' => $properties, // بيانات العقارات
    //         'users' => $users, // بيانات المستخدمين
    //     ]);
    // }


    public function searchrealestatesss(Request $request)
    {
        // الحصول على نص البحث من الطلب
        $search = $request->input('search');

        // جلب العقارات مع تطبيق عوامل تصفية البحث
        $properties = RealEstate::where(function ($query) use ($search) {
            if (!empty($search)) {
                $query->where('description', 'like', '%' . $search . '%') // البحث في الوصف
                    ->orWhere('location', 'like', '%' . $search . '%') // البحث في الموقع
                    ->orWhere('price', 'like', '%' . $search . '%') // البحث في السعر
                    ->orWhere('status', 'like', '%' . $search . '%'); // البحث في الحالة
            }
        })
            ->with(['realEstateable', 'features', 'attachments', 'advertisement']) // تحميل العلاقات المطلوبة
            ->get()->filter(function ($realEstate) {
                return $realEstate !== null; // استبعاد القيم null
            })
            ->map(function ($realEstate) {
                // تعديل مرفقات العقار لإضافة روابط الصور
                $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                    // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                    // هنا نضيف رابط لكل صورة
                    $attachment->file_path = url(Storage::url($attachment->file_path));

                    return $attachment;
                });

                // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable


                return $realEstate;
            });


        // جلب المستخدمين
        $users = User::with(['userable', 'city'])
            ->get();


        return response()->json([
            'realEstates' => $properties, // بيانات العقارات
            'users' => $users, // بيانات المستخدمين
        ]);
    }


    // public function indexapartment()
    // {
    //     // جلب جميع العقارات مع العلاقات المطلوبة
    //     $realEstates = RealEstate::with(['realEstateable', 'features', 'attachments', 'advertisement'])
    //         ->apartments()
    //         ->get()
    //         ->filter(function ($realEstate) {
    //             return $realEstate !== null; // استبعاد القيم null
    //         })
    //         ->map(function ($realEstate) {
    //             // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable
    //             if ($realEstate->relationLoaded('realEstateable') && $realEstate->realEstateable) {
    //                 $realEstate->realEstateable->makeHidden(['access']);
    //             }

    //             // استبعاد الحقول غير المرغوب فيها من علاقة advertisement
    //             if ($realEstate->relationLoaded('advertisement') && $realEstate->advertisement) {
    //                 $realEstate->advertisement->makeHidden(['rating']);
    //             }

    //             return $realEstate;
    //         })
    //         ->filter(function ($realEstate) {
    //             return !empty($realEstate->realEstateable) || !empty($realEstate->advertisement); // استبعاد العقارات الفارغة
    //         });

    //     // جلب جميع المستخدمين مع العلاقات المطلوبة (مثال: userable, city)
    //     $users = User::with(['userable', 'city'])
    //         ->get()
    //         ->filter(function ($user) {
    //             return $user !== null; // استبعاد القيم null
    //         })
    //         ->map(function ($user) {
    //             // إخفاء الحقول المحددة من علاقة userable
    //             if ($user->relationLoaded('userable') && $user->userable) {
    //                 $user->userable->makeHidden(['personal_id_image', 'commercial_certificate_image', 'access']);
    //             }

    //             // إخفاء الحقول من المستخدم
    //             return $user->makeHidden(['email_verified_at', 'avatar', 'access', 'name']);
    //         });

    //     // إرجاع البيانات بصيغة JSON مع العقارات والمستخدمين
    //     return response()->json([
    //         'realEstates' => $realEstates, // بيانات العقارات
    //         'users' => $users, // بيانات المستخدمين
    //     ]);
    // }


    public function indexapartment()
    {
        // جلب جميع العقارات مع العلاقات المطلوبة
        $realEstates = RealEstate::with(['realEstateable', 'features', 'attachments'])
            ->get()
            ->filter(function ($realEstate) {
                return $realEstate !== null; // استبعاد القيم null
            })
            ->map(function ($realEstate) {
                // تعديل مرفقات العقار لإضافة روابط الصور
                $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                    // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                    // هنا نضيف رابط لكل صورة
                    $attachment->file_path = url(Storage::url($attachment->file_path));

                    return $attachment;
                });

                // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable


                return $realEstate;
            });

        // جلب جميع المستخدمين مع العلاقات المطلوبة (مثال: userable, city)
        $users = User::with(['userable', 'city'])
            ->whereHas('userable', function ($query) {
                $query->where('userable_type', 'App\\Models\\Provider'); // استعلام لجلب المزودين فقط
            })
            ->get();

        // إرجاع البيانات بصيغة JSON مع العقارات والمستخدم المحدد
        return response()->json([
            'realEstates' => $realEstates, // بيانات العقارات
            'users' => $users, // بيانات المستخدم المحدد
        ]);
    }



    public function indexbuilding()
    {
        // جلب جميع العقارات مع العلاقات المطلوبة
        // جلب جميع العقارات مع العلاقات المطلوبة
        $realEstates = RealEstate::with(['realEstateable', 'attachments', 'advertisement'])
            ->buildings() // تأكد من أن هذا هو الاستعلام الصحيح لجلب الشقق
            ->get()->filter(function ($realEstate) {
                return $realEstate !== null; // استبعاد القيم null
            })
            ->map(function ($realEstate) {
                // تعديل مرفقات العقار لإضافة روابط الصور
                $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                    // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                    // هنا نضيف رابط لكل صورة
                    $attachment->file_path = url(Storage::url($attachment->file_path));

                    return $attachment;
                });

                // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable


                return $realEstate;
            });



        // جلب جميع المستخدمين مع العلاقات المطلوبة (مثال: userable, city)
        $users = User::with(['userable', 'city'])
            ->get();


        // إرجاع البيانات بصيغة JSON مع العقارات والمستخدمين
        return response()->json([
            'realEstates' => $realEstates, // بيانات العقارات
            'users' => $users, // بيانات المستخدمين
        ]);
    }

    public function indexland()
    {
        // جلب جميع العقارات مع العلاقات المطلوبة
        $realEstates = RealEstate::with(['realEstateable', 'attachments', 'advertisement'])
            ->lands() // تأكد من أن هذا هو الاستعلام الصحيح لجلب الشقق
            ->get()->filter(function ($realEstate) {
                return $realEstate !== null; // استبعاد القيم null
            })
            ->map(function ($realEstate) {
                // تعديل مرفقات العقار لإضافة روابط الصور
                $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                    // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                    // هنا نضيف رابط لكل صورة
                    $attachment->file_path = url(Storage::url($attachment->file_path));

                    return $attachment;
                });

                // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable


                return $realEstate;
            });

        // جلب جميع المستخدمين مع العلاقات المطلوبة (مثال: userable, city)
        $users = User::with(['userable', 'city'])
            ->get();

        // إرجاع البيانات بصيغة JSON مع العقارات والمستخدمين
        return response()->json([
            'realEstates' => $realEstates, // بيانات العقارات
            'users' => $users, // بيانات المستخدمين
        ]);
    }



    public function showAllSales()
    {
        // جلب جميع العقارات التي حالتها "بيع" مع العلاقات المطلوبة
        $realEstates = RealEstate::with(['realEstateable', 'features', 'attachments'])
            ->where('status', 'sale') // تصفية العقارات التي حالتها بيع
            ->get()
            ->filter(function ($realEstate) {
                return $realEstate !== null; // استبعاد القيم null
            })
            ->map(function ($realEstate) {
                // تعديل مرفقات العقار لإضافة روابط الصور
                $realEstate->attachments = $realEstate->attachments->map(function ($attachment) {
                    // افترض أن 'file_path' هو الحقل الذي يحتوي على مسار الصورة
                    // هنا نضيف رابط لكل صورة
                    $attachment->file_path = url(Storage::url($attachment->file_path));

                    return $attachment;
                });

                // استبعاد الحقول غير المرغوب فيها من علاقة realEstateable


                return $realEstate;
            });

        // جلب جميع المستخدمين مع العلاقات المطلوبة (مثال: userable, city)
        $users = User::with(['userable', 'city'])
            ->get()
            ;

        // إرجاع البيانات بصيغة JSON مع العقارات والمستخدمين
        return response()->json([
            'realEstates' => $realEstates, // بيانات العقارات
            'users' => $users, // بيانات المستخدمين
        ]);
    }


}