<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
        // Authentication passed...
        return response()->json(['success' => true, 'message' => 'Login Successful']);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid Login Credentials']);
        }
    }

}
