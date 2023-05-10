<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $user = Auth::attempt(['email' => $credentials['email'], 'password' => Hash::make($credentials['password'])]);

        if ($user) {
            return response()->json([
                'message' => 'Login successful.',
                'token' => $user->createToken('authToken')->accessToken,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid email or password.'
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logout successful.'
        ], 200);
    }
}
