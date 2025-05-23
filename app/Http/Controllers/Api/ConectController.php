<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ConectController extends Controller
{
    public function index()
    {
        $contacts = Contact::all()->map(function ($contact) {
            // إخفاء الحقول created_at و updated_at إذا كانت null
            if (is_null($contact->created_at)) {
                $contact->makeHidden(['created_at']);
            }
            if (is_null($contact->updated_at)) {
                $contact->makeHidden(['updated_at']);
            }
            if (is_null($contact->apk_icon)) {
                $contact->makeHidden(['apk_icon']);
            }
            return $contact;
        });

        // إرجاع البيانات بتنسيق JSON
        return response()->json([

            'data' => $contacts
        ]);
    }

}