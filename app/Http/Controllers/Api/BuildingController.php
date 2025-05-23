<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use App\Models\Building;

use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        // جلب الشقق مع العلاقات المرتبطة
        $reals = RealEstate::with(['realEstateable', 'advertisement'])->building()->get();

        // إرجاع البيانات كـ JSON
        return response()->json([
            'success' => true,
            'data' => $reals
        ], 200);
    }
}
