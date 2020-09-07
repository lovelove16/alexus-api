<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;
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
            'forgotpassword_token' =>$request->forgotpassword_token,
            'permission' => $request->permission
        ]);
        $user->save();
        return response()->json([
            'message' => 'User successfully registered! '
        ]);
    }

    public function forgotPassword(Request $request) {
        $request->validate(['email'=>'string|required|email']);

        if (!$user = User::where('email', $request->email)->first()) {
            return response()->json(['message'=>'User does not exist'], 404);
        }
        do {
            $token = Str::random(64);
        } while (User::where('forgotpassword_token', '=', $token)->exists());

        $user->forgotpassword_token = $token;

        if($user->save()){
            Mail::to($request->email)->send(new ForgotPassword($user));
            return response()->json(['message'=>'Email has successfully been sent to the user'], 200);
        }

    }

    public function resetPassword(Request $request) {
        $request->validate([
            'password'=>'string|required|confirmed',
            'token'=>'string|required'
        ]);
        
        if (!$user = User::where('forgotpassword_token', $request->token)->first()) {
            return response()->json(['message'=>'Invalid Reset Request'], 404);
        }

        $user->password = bcrypt($request->password);
        $user->forgotpassword_token = null;

        if($user->save()){
            return response()->json(['message'=>'Your password has successfully been updated'], 200);
        }
        
    }

}
