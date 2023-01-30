<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(Request $request){
        $user=User::where('email',$request->email)->first();
        if($user){
            $pwcheck=Hash::check($request->password,$user->password);
            if($pwcheck){
                return response()->json([
                    'status'=>true,
                    'user'=>$user,
                    'token'=>$user->createToken(time())->plainTextToken,
                ], 200);
            }else{
                return response()->json('false', 200);
            }
        }else{
            return response()->json([
                'status'=>false,
                'user'=>null,
                'token'=>null,
            ],200);
        }

    }
    //register
    public function register(Request $request){
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        User::create($data);
        $user=User::where('email',$request->email)->first();
        return response()->json([
            'user'=>$user,
            'token'=>$user->createToken(time())->plainTextToken,
        ], 200);
    }


}

