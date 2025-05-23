<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Apartment;
use App\Models\Building;
use App\Models\Land;
use App\Models\Advertisement;
use App\Models\RealEstate;
use App\Models\Contact;
use App\Models\City;

use App\Models\Provider;
use App\Models\user;
use App\Models\admin;
use App\Services\DashboardHelperadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $dashboardHelperadmin;

    public function __construct(DashboardHelperadmin $dashboardHelperadmin)
    {
        $this->dashboardHelperadmin = $dashboardHelperadmin;
    }




    public function index()
    {

        $admin = Auth::user();  // جلب المستخدم الحالي الذي يفترض أن يكون الإدمن
        // $adminId = $admin->id;  // افترض أن لديك معرّف خاص بالإدمن


        // يمكنك هنا تخصيص البيانات التي يحتاجها الإدمن
        // على سبيل المثال، إحصائيات عامة أو مشرفين آخرين
        $this->dashboardHelperadmin = new DashboardHelperadmin($admin);
        // // تعيين إدمن في `DashboardHelper`
        // $this->dashboardHelperadmin->setAdmin($admin);

        // جلب البيانات التي قد تكون مفيدة للإدمن
        $totalUsers = $this->dashboardHelperadmin->getTotalUsers();
        $activeAdvertisements = $this->dashboardHelperadmin->getActiveAdvertisements();
        $inactiveAdvertisements = $this->dashboardHelperadmin->getInactiveAdvertisements();
        $totalRealEstate = $this->dashboardHelperadmin->getTotalRealEstate();
        $landsForSale = $this->dashboardHelperadmin->getLandsForSale();
        $landsForRent = $this->dashboardHelperadmin->getLandsForRent();
        $apartmentsForSale = $this->dashboardHelperadmin->getApartmentsForSale();
        $apartmentsForRent = $this->dashboardHelperadmin->getApartmentsForRent();
        $buildingsForSale = $this->dashboardHelperadmin->getBuildingsForSale();
        $buildingsForRent = $this->dashboardHelperadmin->getBuildingsForRent();
        $totalRequests = $this->dashboardHelperadmin->getTotalRequests();
        // $totalComplaints = $this->dashboardHelper->getTotalComplaints();
        // $totalSuggestions = $this->dashboardHelper->getTotalSuggestions();
        $totalContacts = $this->dashboardHelperadmin->getTotalContacts();
        $registeredAccounts = $this->dashboardHelperadmin->getRegisteredAccounts();
        // dd($totalUsers, $activeAdvertisements, $inactiveAdvertisements);
        $totalClients = $this->dashboardHelperadmin->getTotalClients();
        $totalProviders = $this->dashboardHelperadmin->getTotalProviders();
        $stats = $this->dashboardHelperadmin->getAdsStatsByCity();
        $reqstats = $this->dashboardHelperadmin->getRequestStats();


    // تمرير الشهر إلى الدالة
        $topProviders = $this->dashboardHelperadmin->getTopProviders();

        return view('admin.dashboard', compact(
            'admin',
            'totalUsers',
            'activeAdvertisements',
            'inactiveAdvertisements',
            'totalRealEstate',
            'landsForSale',
            'landsForRent',
            'apartmentsForSale',
            'apartmentsForRent',
            'buildingsForSale',
            'buildingsForRent',
            'totalRequests',
            'totalContacts',
            'registeredAccounts',
            'totalClients',  // إضافة عدد العملاء
            'totalProviders',// إضافة عدد المزودين
            'topProviders', // افضل  المزودين
            'stats',
            'reqstats',
        ));
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
