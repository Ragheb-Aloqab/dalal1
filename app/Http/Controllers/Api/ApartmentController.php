<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use App\Models\Apartment;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        // جلب الشقق مع العلاقات المرتبطة
        $reals = RealEstate::with(['realEstateable', 'advertisement'])->apartments()->get();

        // إرجاع البيانات كـ JSON
        return response()->json([
            'success' => true,
            'data' => $reals
        ], 200);
    }
}