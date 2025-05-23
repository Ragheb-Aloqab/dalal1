<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiController extends Controller
{
    public function chatWithGemini(Request $request)
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);

        $apiKey = env('GEMINI_API_KEY');
        $query = $validated['query'];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . $apiKey, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $query]
                    ]
                ]
            ]
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json([
                'status' => 'fail',
                'message' => 'Gemini API error',
                'error' => $response->json()
            ], $response->status());
        }
    }
}
