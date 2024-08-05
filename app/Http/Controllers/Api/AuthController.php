<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

 
    public function createUser(Request $request){
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'age'=>$request->age,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'password'=>$request->password,
        ]);
        return response()->json([
            "message" => "User was added successfully",
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }



    public function loginUser(Request $request){
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                "message" => "error",
            ], 500);
        }

        $user = User::where('email' , $request->email)->first();
        return response()->json([
            "message" => "User was Loged In successfully",
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
        
    }


}



