<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ApiTest extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function store(Request $request){
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'age'=>$request->age,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'password'=>$request->password,
        ]);
        return response()->json([
            "message" => "User was added successfully"
        ]);
    }


}
