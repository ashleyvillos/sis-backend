<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $login_data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($login_data)) {
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        
        return response(['access_token' => $accessToken]);
    }
}
