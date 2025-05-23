<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::all()->map(function ($condition) {
            // إخفاء الحقول created_at و updated_at إذا كانت null
            if (is_null($condition->created_at)) {
                $condition->makeHidden(['created_at']);
            }
            if (is_null($condition->updated_at)) {
                $condition->makeHidden(['updated_at']);
            }
            return $condition;
        });

        // إرجاع البيانات بتنسيق JSON لإرسالها إلى تطبيق Flutter
        return response()->json([
          
            'data' => $conditions
        ]);
    }


}