<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    public function login( Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $scopes = explode(',',$user->permission);
        $tokenResult = $user->createToken('Personal Access Token', $scopes);
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,'token_type' => 'Bearer',
            'user' => new UserResource($user)
        ], 200);
            
    }

    public function register(Request $request) {
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);
        if(User::where('email', $request->email)->exists()) {
            return response()->json([
                'message' => 'There is an existing account associated with this email'
            ], 422);
        }

        $user = new User([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'office_telephone' => $request->office_telephone,
            'mobile_number' =>$request->mobile_number,
            'permission' => 'administrator'
        ]);
        $user->save();
        return response()->json([
            'message' => 'User successfully registered! '
        ]);
    }
}
