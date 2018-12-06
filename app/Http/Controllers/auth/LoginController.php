<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * Login user and create token
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse [string] access_token
     */
    public function index(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Incorrect email or password'
            ], 401);
        }
        $user = $request->user;
        $token = $user->createToken();
        return response()->json([
            'access_token' => $token->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $token->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * logout
     *
     * @param  mixed $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


}
