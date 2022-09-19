<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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


        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'unauthorized', 401]);
        }
        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // $token->expires_at = Carbon::now()->addWeeks(2);
        // $token->save();
        return response()->json([
            "user" => Auth::user(),
            // 'access_token' => $tokenResult->accessToken,
            // 'token_type' => 'Bearer',
            // 'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|string|confirmed',

        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        return response()->json(['message' => 'user created successfully']);
    }
}
