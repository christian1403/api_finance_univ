<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if(!auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = auth()->user();
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $user->createToken('api_token')->plainTextToken,
        ], 200);
        //
    }
}
