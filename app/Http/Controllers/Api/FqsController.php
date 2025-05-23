<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fqs;
use Illuminate\Http\Request;

class FqsController extends Controller
{
    public function index()
    {
        $fqs = Fqs::all()->map(function ($fq) {
            // إخفاء الحقول created_at و updated_at إذا كانت null
            if (is_null($fq->created_at)) {
                $fq->makeHidden(['created_at']);
            }
            if (is_null($fq->updated_at)) {
                $fq->makeHidden(['updated_at']);
            }
            return $fq;
        });

        // إرجاع البيانات بتنسيق JSON
        return response()->json([

            'data' => $fqs
        ]);
    }


}