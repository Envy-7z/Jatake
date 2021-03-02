<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiProducts as Products;
use App\ApiAdmins as Admins;
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
        })->except(['login','request_login']);
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
        $resp = $this->admin->loginAdmin($login);
        if(!empty($resp->err) || empty($resp->token))
        {
            return response()->json($resp,403);
        }
        session()->put('admin_token',$resp->token);
        unset($resp->token);
        return response()->json(['data'=>$resp,],200);
    }

    public function logout()
    {
        session()->flush();
        return redirect(route('admin.login'));
    }

}
