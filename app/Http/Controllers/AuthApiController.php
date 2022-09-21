<?php

namespace App\Http\Controllers;

use Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        // return response()->json([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        $request->validate([
            'email' => 'required',
            'password' => 'required|string',
        ]);


        if (!$token = auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'unauthorized', 401]);
        }
        $ttt = 1;
        $timel = JWTAuth::factory()->setTTL($ttt);
        return $this->createNewToken($token, $timel);
        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // $token->expires_at = Carbon::now()->addWeeks(2);
        // $token->save();
        // return response()->json([
        //     "user" => Auth::user(),
        //     // 'access_token' => $tokenResult->accessToken,
        //     // 'token_type' => 'Bearer',
        //     // 'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        // ]);
    }
    public function  createNewToken($token, $timel)
    {

        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "expires_in" => auth()->factory()->getTTL(),
            // "expires" => $timel,
            "user" => auth()->user(),
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',

        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        return response()->json(['message' => 'user created successfully'], 201);
    }
}
