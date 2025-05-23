<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use App\Models\Land;
use App\Http\Controllers\RealEstateController;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index()
    {
        // جلب الشقق مع العلاقات المرتبطة
        $reals = RealEstate::with(['realEstateable', 'advertisement'])->lands()->get();

        // إرجاع البيانات كـ JSON
        return response()->json([
            'success' => true,
            'data' => $reals
        ], 200);
    }
}
