<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Store user's registration information
        $validatedData = $request->validate([
            'first_name'=>'required|max:55',
            'last_name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        // Encrypt password
        $validatedData['password'] = bcrypt($request->password);

        // Create user using User Model
        $user = User::create($validatedData);

        // Create token and assign it to the user
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        // Store user's credentials
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        // Attempt to authenticate user
        if(!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid email or password.']);
        }

        // If user is registered, assign a token
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'token' => $accessToken]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response(['message' => 'Logout successful.']);
    }
} 
