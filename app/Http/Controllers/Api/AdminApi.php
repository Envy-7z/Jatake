<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admins;

class AdminApi extends Controller
{
    public function login(Request $req)
    {
        $login = $req->all();
        if(empty(Admins::where('email',$login['email'])->get()->toArray())){
            return response()->json(['message'=>'User Email tidak ditemukan','err'=>$login],403);
        }
        if(!auth()->attempt($login))
        {
            return response()->json(['message'=>'Password Salah','err'=>auth()->attempt($login)],403);
        }

        $acc_token = auth()->user()->createToken('authToken')->accessToken;

        return response()->json(['admin'=>auth()->user(),'token'=>$acc_token],200);
    }
}
