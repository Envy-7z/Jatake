<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiProducts as Products;
use App\ApiAdmins as Admins;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;



class AdminController extends Controller
{

    public function __construct()
    {
        $this->admin = new Admins();
        $this->products = new Products();
        $this->middleware(function($req,$next){
            if(!empty(session('admin_token')))
            {
                $this->token = session('admin_token');
                $this->products = new Products(['token'=>$this->token,]);
                $this->admin = new Admins(['token'=>$this->token,]);
            }
            else
            {
                if($req->expectsJson())
                    return response()->json(['message'=>'Unauthorized',],403);
                return redirect(route('admin.login'));
            }
            return $next($req);
        })->except(['login','authenticate']);
    }

    public function index()
    {
        return redirect(route('admin.products.index'));
        $products = $this->products->getProductsAll();
        return view('admin',['products'=>$products]);
    }

    public function login(Request $req)
    {
        return view('login');
    }

    public function request_login(Request $req)
    {
        $login = $req->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);
        // // dd($login);
        // $resp = $this->admin->loginAdmin($login);
        // if(!empty($resp->err) || empty($resp->token))
        // {
        //     return response()->json($resp,403);
        // }
        // session()->put('admin_token',$resp->token);
        // unset($resp->token);
        // return response()->json(['data'=>$resp,],200);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);
        $user = DB::table('admins')
        ->select('*')
        ->where('email', $request->input('email'))
        ->first();
        if(Hash::check($request->input('password'), $user->password)){
           session()->put('admin_token',$user->password);
        //    return response()->json(['status' => 'success'], 200);
           return \redirect('admin');
       }else{
        //    return response()->json(['status' => 'fail'],401)
            return \redirect('admin/login');
       }
    }

    public function logout()
    {
        session()->flush();
        return \redirect()->route('admin.login');
    }

}
