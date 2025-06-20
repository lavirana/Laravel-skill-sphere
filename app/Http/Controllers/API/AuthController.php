<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request){
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8',
            ]
            );

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()->all()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => true,
                    'message' => 'User Created Successfully',
                    'user' => $user
                ], 200);
            }
    }
    public function login(Request $request){
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]
            );

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Authentication Fails',
                    'errors' => $validateUser->errors()->all()
                ], 401);
            }


            If(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'status' => true,
                    'message' => 'User Logged In Successfully',
                    'user' => $user,
                    'token' => $token,
                    'token_type' => 'Bearer'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Credentials'
                ], 401);
            }
    }
            public function logout(Request $request){
                $user = $request->user();
                $user->token()->delete();

                return response()->json([
                    'status' => true,
                    'user' => $user,
                    'message' => 'You have been logged out successfully',
                ], 200);

            }
}
