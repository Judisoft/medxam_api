<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user_info = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|string|unique:users,email',
            'telephone' => 'required|max:9',
            'user_name' => 'required|string|min:3',
            'password' => 'required|string',
            'level' => 'required|string',
            'institution' => 'required|string'
        ]);

        $user = User::create([
            'first_name' => $user_info['first_name'],
            'last_name' => $user_info['last_name'],
            'email' => $user_info['email'],
            'telephone' => $user_info['telephone'],
            'user_name' => $user_info['user_name'],
            'password' => bcrypt($user_info['password']),
            'level' => $user_info['level'],
            'institution' => $user_info['institution']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged Out Successfully'
        ];
    }
}
