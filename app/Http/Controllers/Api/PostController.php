<?php

namespace App\Http\Controllers\Api;

use \Log;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
      {

        return $request;
      }
      public function register(Request $request)
     {
        return $request;

     }
     public function show(Request $request)
     {

        $data = $request->all();
        return $data;//$dataview('show', ['data' => $data]);

         // طباعة البيانات المستلمة
     
        //  return   $request;//response()->json(['message' => 'Data received', 'data' => $request->all()], 200);
     }
     

}