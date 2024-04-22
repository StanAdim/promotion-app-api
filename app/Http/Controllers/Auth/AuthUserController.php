<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function login(Request $request ){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        #Failure response of Validation
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation fails',
                'errors' => $validator->errors()
            ], 422);
        }
        $data = $validator->validate();
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('auth-token')->plainTextToken;
                return response()->json([
                    'message' => 'Login Successful!',
                    'token' => $token,
                    'data' => $user,
                    'code' => 200
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Incorrect Credentials',
                    'code' => 300
                ], 200);
            }
        }
        return response()->json([
            'message' => 'User Not Found',
            'code' => 300,
        ]);
    }
    public function logout(Request $request ){
        #Log user out

        return response()->json([
            'message' => 'User Logged Out',
            'code' => 200,
        ]);
    }
}
