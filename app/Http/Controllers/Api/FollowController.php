<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FollowController extends Controller
{
    // عرض المتابعات
    public function index() {
        $follows = Follow::all();
        return response()->json($follows); // Return JSON response for consistency
    }

    // متابعة مزود
    public function follow(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'provider_id' => 'required|exists:providers,id',
        ]);
    
        try {
            // Use firstOrCreate to check if the follow exists or create a new follow
            $follow = Follow::firstOrCreate(
                [
                    'user_id' => $validated['user_id'],
                    'provider_id' => $validated['provider_id']
                ]
            );
    
            // Check if the follow was just created
            if ($follow->wasRecentlyCreated) {
                return response()->json([
                    'message' => 'Followed successfully',
                    'follow' => $follow
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Already following',
                    'follow' => $follow
                ], 200);
            }
        } catch (\Exception $e) {
            // Handle unexpected errors
            Log::error('Follow error: ' . $e->getMessage()); // Log the error
            return response()->json([
                'message' => 'An error occurred while trying to follow the provider',
                'error' => 'Internal Server Error'
            ], 500);
        }
    }
    
    // إلغاء متابعة مزود
    public function unfollow(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'provider_id' => 'required|exists:providers,id',
        ]);
    
        try {
            // Delete the follow
            $deleted = Follow::where('user_id', $validated['user_id'])
                ->where('provider_id', $validated['provider_id'])
                ->delete();
    
            if ($deleted) {
                return response()->json(['message' => 'Unfollowed successfully'], 200);
            }
    
            return response()->json(['message' => 'Follow not found'], 404);
        } catch (\Exception $e) {
            // Handle unexpected errors
            Log::error('Unfollow error: ' . $e->getMessage()); // Log the error
            return response()->json([
                'message' => 'An error occurred while trying to unfollow the provider',
                'error' => 'Internal Server Error'
            ], 500);
        }
    }
    
    // التحقق مما إذا كان المستخدم يتابع المزود
    public function isFollowing(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'provider_id' => 'required|exists:providers,id',
        ]);
    
        try {
            // Check if the follow exists
            $exists = Follow::where('user_id', $validated['user_id'])
                ->where('provider_id', $validated['provider_id'])
                ->exists();
    
            return response()->json(['is_following' => $exists], 200);
        } catch (\Exception $e) {
            // Handle unexpected errors
            Log::error('Check following status error: ' . $e->getMessage()); // Log the error
            return response()->json([
                'message' => 'An error occurred while checking following status',
                'error' => 'Internal Server Error'
            ], 500);
        }
    }
}