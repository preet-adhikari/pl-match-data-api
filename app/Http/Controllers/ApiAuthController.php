<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|string|min:6',
            'type' => 'integer'
        ]);
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => ($request->type) ? $request->type : 0
        ]);
        // Generate the token
        $token = $user->createToken('Access Token');
        // dd($token);
        return response([
            'access_token' => $token->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ], 200);
    }

    public function login(Request $request)
    {
        // Validate user
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6|string|confirmed'
        ]);
        // Login user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $token = Auth::user()->createToken("Access Token");
            return response([
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
            ]);
        } else {
            return response([
                'message' => 'The email or password is not correct.'
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        //Revoke the access token
        $token->revoke();
        return response([
            "message" => "You have successfully been logged out."
        ], 200);
    }
}
