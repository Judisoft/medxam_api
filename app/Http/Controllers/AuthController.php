<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\InvalidOrderException;
use App\Mail\VerificationEmail;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    public function index() {
        $users = User::all();
        $response = [
            'users' => $users
        ];
        return response($response, 200);
    }
    

    public function register(Request $request) {
        $user_info = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|string|unique:users,email',
            'telephone' => 'required|max:9',
            'password' => 'required|string|min:8|confirmed',
            'level' => 'required|string',
            'institution' => 'required|string',
            'bio' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


            $user = User::create([
                'first_name' => $user_info['first_name'],
                'last_name' => $user_info['last_name'],
                'email' => $user_info['email'],
                'telephone' => $user_info['telephone'],
                'password' => bcrypt($user_info['password']),
                'level' => $user_info['level'],
                'institution' => $user_info['institution'],
                'email_verification_token' => Str::random(32)
                
            ]);
            $token = $user->createToken('myapptoken')->plainTextToken;

            \Mail::to($user->email)->send(new VerificationEmail($user));

            $response = [
                'message' => 'User created successfully',
                'user' => $user,
                'token' => $token
            ];
            return response($response, 201);
    }

    public function updateuser(Request $request, $id) {
        $user = User::find($id);

        $user->update($request->except('password'));

        if ($password = $request->get('password')) {
            $user->password = Bcrypt($password);
            $user->save();
        }

        $response = [
            'message' => "User updated successfully",
            'user' => $user,
            
        ];
        return response($response, 200);
        
    }
    
    public function login(Request $request) {
        $user_info = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

       // check email
       $user = User::where('email', $user_info['email'])->first();
       $response = [
           'message' => 'You have been successfully logged in',
           'user' => $user
       ];

       return response($response, 200);

       //check password
       if(!$user || !Hash::check($user_info['password'], $user->password)) {
           return response([
                'message' => 'Login Credentials do not match our records',
           ], 401);
       } 
       else {

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
       }
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged Out Successfully'
        ];
    }
}
