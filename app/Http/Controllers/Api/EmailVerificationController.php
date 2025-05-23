<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerificationCodeMail;

class EmailVerificationController extends Controller
{
    /**
     * Verify the user's email with the verification code
     */
    public function verify(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|string',
        ]);

        // Find the user based on email and verification code
        $user = User::where('email', $request->email)
                    ->where('verification_code', $request->verification_code)
                    ->first();

        if ($user) {
            // Mark the user's email as verified
            $user->email_verified_at = now();
            $user->save();

            return response()->json(['message' => 'Email verified successfully'], 200);
        } else {
            return response()->json(['error' => 'Invalid verification code'], 400);
        }
    }

    /**
     * Send verification code to user's email
     */
    public function sendVerificationCode(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a new verification code (you should implement this in your User model)
            $user->generateVerificationCode();

            // Send the verification code via email
            Mail::to($user->email)->send(new VerificationCodeMail($user->verification_code));

            return response()->json(['message' => 'Verification code sent successfully'], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}