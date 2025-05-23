<?php


namespace App\Services;
use Illuminate\Support\Facades\DB; // إضافة هذه السطر
use App\Models\Apartment;
use App\Models\Building;
use App\Models\Land;
use App\Models\Advertisement;
use App\Models\RealEstate;
use App\Models\Request;
use App\Models\Contact;

use App\Models\Provider;
use App\Models\user;
use App\Models\Client;
use App\Models\City;


class  DashboardHelperadmin
{
    protected $admin;

    public function __construct($admin = null)
    {
        $this->admin = $admin;
    }


    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }



    // جلب جميع المستخدمين
    public function getTotalUsers()
    {
        return User::all()->count(); // إجمالي المستخدمين
    }

    // جلب عدد العملاء
    public function getTotalClients()
    {
        return Client::count(); // تأكد من استبدال Client باسم موديل العميل الصحيح
    }

    // جلب عدد المزودين
    public function getTotalProviders()
    {
        return Provider::count(); // تأكد من استبدال Provider باسم موديل المزود الصحيح
    }


    // جلب جميع الإعلانات النشطة
    public function getActiveAdvertisements()
    {
        return Advertisement::where('status', 'active')->count(); // الإعلانات النشطة
    }

    // جلب الإعلانات الغير نشطة
    public function getInactiveAdvertisements()
    {
        return Advertisement::where('status', 'inactive')->count(); // الإعلانات غير النشطة
    }

    // جلب العقارات بشكل عام
    public function getTotalRealEstate()
    {
        return RealEstate::count(); // إجمالي العقارات
    }




    // جلب الأراضي
    // public function getLandsForSale()
    // {
    //     return RealEstate::where('type', 'land')->where('status', 'for sale')->count(); // الأراضي للبيع

    // }

    // جلب الأراضي للبيع
    // جلب الأراضي للبيع
    public function getLandsForSale()
    {
        return RealEstate::where('real_estateable_type', Land::class)
            ->where('status', 'sale')
            ->count(); // الأراضي للبيع
    }


    public function getLandsForRent()
    {
        return RealEstate::where('real_estateable_type', 'land')->where('status', 'rent')->count(); // الأراضي للإيجار
    }

    // جلب الشقق
    public function getApartmentsForSale()
    {
        return RealEstate::where('real_estateable_type', 'apartment')->where('status', 'sale')->count(); // الشقق للبيع
    }

    public function getApartmentsForRent()
    {
        return RealEstate::where('real_estateable_type', 'apartment')->where('status', 'rent')->count(); // الشقق للإيجار
    }

    // جلب المباني
    public function getBuildingsForSale()
    {
        return RealEstate::where('real_estateable_type', 'building')->where('status', 'sale')->count(); // المباني للبيع
    }

    public function getBuildingsForRent()
    {
        return RealEstate::where('real_estateable_type', 'building')->where('status', 'rent')->count(); // المباني للإيجار
    }



    public function getAdsStatsByCity() // بدون static
    {
        return City::withCount('realEstates')
            ->get()
            ->map(function ($city) {
                return [
                    'name' => $city->name,
                    'ads_count' => $city->real_estates_count,
                ];
            });
    }





    // جلب الطلبات
    public function getTotalRequests()
    {
        return Request::count(); // إجمالي الطلبات
    }


    // جلب عدد التواصل
    public function getTotalContacts()
    {
        return Contact::count(); // عدد تواصل المستخدمين
    }

    // جلب الحسابات المسجلة
    public function getRegisteredAccounts()
    {
        return User::count(); // عدد الحسابات المسجلة
    }







//    public function getTopProviders()
//    {
//        return Provider::select('providers.*') // اختيار بيانات المزودين
//            ->join('advertisements', 'providers.id', '=', 'advertisements.provider_id') // الربط مع جدول الإعلانات
//            ->whereMonth('advertisements.created_at', '=', now()->month) // جلب الإعلانات الخاصة بالشهر الحالي
//            ->groupBy('providers.id') // تجميع البيانات حسب المزود
//            ->selectRaw('COUNT(advertisements.id) as advertisements_count') // عدّ الإعلانات لكل مزود
//            ->orderBy('advertisements_count', 'desc') // ترتيب المزودين حسب عدد الإعلانات
//            ->take(10) // جلب أفضل 10 مزودين
//            ->get();
//    }
//


    public function getTopProviders()
    {
        return Provider::join('advertisements', 'providers.id', '=', 'advertisements.provider_id')
            ->whereMonth('advertisements.created_at', '=', now()->month)
            ->select('providers.id', 'providers.name', 'providers.logo') // حدد الأعمدة التي تحتاجها صراحة
            ->selectRaw('COUNT(advertisements.id) as advertisements_count')
            ->groupBy('providers.id', 'providers.name', 'providers.logo') // ضم جميع الأعمدة التي اخترتها في groupBy
            ->orderByDesc('advertisements_count')
            ->take(10)
            ->get();
    }




    // public function getRequestStats()
    // {
    //     return [
    //         // إجمالي عدد الطلبات
    //         'total_requests' => Request::count(),

    //         // عدد الطلبات حسب نوع الطلب
    //         'requests_by_type' => Request::select('request_type', \DB::raw('count(*) as total'))
    //             ->groupBy('request_type')
    //             ->get(),

    //         // عدد الطلبات حسب حالة الطلب
    //         'requests_by_status' => Request::select('status', \DB::raw('count(*) as total'))
    //             ->groupBy('status')
    //             ->get(),

    //         // الطلبات المعلقة
    //         'pending_requests' => Request::where('status', 'pending')->count(),

    //         // الطلبات المكتملة
    //         'completed_requests' => Request::where('status', 'completed')->count(),
    //     ];
    // }

    // public function getRequestStats()
    // {
    //     // إحصائيات الطلبات حسب نوع الطلب وحالة الطلب بدون استخدام DB::raw
    //     $requestsByTypeAndStatus = Request::select('request_type', 'status')
    //         ->groupBy('request_type', 'status')
    //         ->withCount('id')  // لحساب عدد الطلبات لكل نوع وحالة
    //         ->get()
    //         ->groupBy('request_type');

    //     // حساب عدد الطلبات المعلقة والمكتملة
    //     $pendingRequests = Request::where('status', 'pending')->count();
    //     $completedRequests = Request::where('status', 'completed')->count();

    //     return [
    //         'total_requests' => Request::count(),
    //         'requests_by_type_and_status' => $requestsByTypeAndStatus,
    //         'pending_requests' => $pendingRequests,
    //         'completed_requests' => $completedRequests,
    //     ];
    // }


    public function getRequestStats()
    {
        // حساب عدد الطلبات لكل نوع
        $requestsByType = Request::select('request_type')
            ->groupBy('request_type')
            ->selectRaw('request_type, COUNT(*) as total')
            ->get();

        // حساب عدد الطلبات لكل حالة
        $requestsByStatus = Request::select('status')
            ->groupBy('status')
            ->selectRaw('status, COUNT(*) as total')
            ->get();

        // حساب عدد الطلبات المعلقة والمكتملة
        $pendingRequests = Request::where('status', 'pending')->count();
        $completedRequests = Request::where('status', 'completed')->count();

        return [
            'total_requests' => Request::count(),
            'requests_by_type' => $requestsByType,
            'requests_by_status' => $requestsByStatus,
            'pending_requests' => $pendingRequests,
            'completed_requests' => $completedRequests,
        ];
    }

}
