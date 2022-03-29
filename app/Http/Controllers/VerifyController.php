<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class VerifyController extends Controller
{
    public function verifyEmail($token = null) {
        
        if ($token == null) {
            $response = [
                'message' => 'Account not activated'
            ];
            
            return response($response, 401);

        }

        $user = User::where('email_verification_token', $token)->first();

        if($user == null) {
            return response("Invalid login attempt", 401);
        }

        $user->update([
            'email_verified' => 1,
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => ''
        ]);

        $response = [
            'message' => 'Accoun verified successfully'
        ];

        return response($response, 200);
    }
}
