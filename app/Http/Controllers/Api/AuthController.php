<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    //
    public function register(Request $request){
        try{

            $validateInput = Validator::make($request->only('name','email','password'),[
                'name' => 'required|string|max:255|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
            ]);

            if($validateInput->fails()){
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Invalid input detected.',
                    'errors' => $validateInput->errors(),
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'status' => 'Ok',
                'message' => 'Success.. User has been registered.',
            ], 200);

        } catch (\Throwable $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }
    }

    public function login(Request $request){
        try{

            $credentials = Validator::make($request->only('name','password'),[
                'name' => 'required|string',
                'password' => 'required|string',
            ]);

            if($credentials->fails()){
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Invalid input detected.',
                    'errors' => $credentials->errors(),
                ], 401);
            }

            auth('sanctum')->attempt(['name' => $request->name, 'password' => $request->password]);

            return response()->json([
                'status' => 'Ok',
                'message' => 'Success.. Login attempt successful.',
                'token' => $request->user()->createToken("API-TOKEN")->plainTextToken,
            ], 200);

        } catch(\Throwable $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }

    }

    public function logout(Request $request){

    }
}
