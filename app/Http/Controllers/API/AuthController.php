<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

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



                public function jwt_register(Request $request){
                    
                                $validateddata = Validator::make(
                                    $request->all(),
                                    [
                                        'name' => 'required|string|max:255',
                                        'email' => 'required|email|max:255|unique:users',
                                        'password' => 'required|min:8',
                                    ]
                                    );

                           
                                    if($validateddata->fails()){
                                        return response()->json([
                                            'status' => false,
                                            'message' => 'Validation Error',
                                            'errors' => $validateddata->errors()->all()
                                        ], 401);
                                    }
                        
                                    $user = User::create([
                                        'name' => $request->name,
                                        'email' => $request->email,
                                        'password' => $request->password,
                                    ]);
                        

                                $token = auth('api')->login($user);
                                return $this->respondWithToken($token);
                }


            public function jwt_login()
            {
                $credentials = request(['email', 'password']);
        
                if (! $token = auth('api')->attempt($credentials)) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
        
                return $this->respondWithToken($token);
            }

            public function jwt_me()
            {
                return response()->json(auth()->user());
            }
        
            /**
             * Log the user out (Invalidate the token).
             *
             * @return \Illuminate\Http\JsonResponse
             */
            public function jwt_logout()
            {
                auth()->logout();
        
                return response()->json(['message' => 'Successfully logged out']);
            }
        
            /**
             * Refresh a token.
             *
             * @return \Illuminate\Http\JsonResponse
             */
            public function jwt_refresh()
            {
                return $this->respondWithToken(auth()->refresh());
            }
        
            /**
             * Get the token array structure.
             *
             * @param  string $token
             *
             * @return \Illuminate\Http\JsonResponse
             */
            protected function respondWithToken($token)
            {
                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60
                ]);
            }
}
