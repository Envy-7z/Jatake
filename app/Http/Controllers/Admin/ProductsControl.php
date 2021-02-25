<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Library\Libs;

class ProductsControl extends Controller
{
    //
    public function __construct()
    {
        $this->product = new Product();
        $this->lib = new Libs();
        $this->middleware(function($req,$next){
            if(!empty(session('admin_token')))
            {
                $this->token = session('admin_token');
            }
            else
            {
                if(!$req->expectsJson())
                    return redirect(route('admin.login'));
                return $this->lib->jsonUnauth();
            }
            return $next($req);
        });

        // secure spesific method
        $this->middleware(function($req,$next){
            if(!$req->expectsJson())
                return $this->lib->jsonUnauth();

            return $next($req);
        })->only(['store,data']);

    }

    public function index(Request $req)
    {
        return view('Admin.products',['page'=>'Products']);
    }

    public function create(Request $req)
    {
        try
        {
            $data = $req->all();
            $this->product->create($data);
            return \Responder::success($this->product)->respond(201);
        }
        catch(\Exception $e)
        {
            return \Responder::error("product_create_fail","Fail to Create Product")->data([$e->__toString()])->respond();
        }
    }

    public function store(Request $req){
        $param = arr2obj($req->all());
        $product = function() use ($param)
        {
            return $this->product->pagination(@$param->page,@$param->per_page,@$param->search);
        };
        try
        {
            return \Responder::success($product())->with('draw',empty($param->draw)?null:$param->draw)->respond();
        }
        catch(\Exception $e)
        {
            return \Responder::error("product_get_fail","Fail to Get Product")->data([$e->__toString()])->respond();
        }
    }

    public function show(Request $req,Product $product){
        try
        {
            return \Responder::success($product)->respond(201);
        }
        catch(\Exception $e)
        {
            return \Responder::error("product_get_by_id_fail","Fail to Get by ID Product")->data([$e->__toString()])->respond();
        }
    }

    public function destroy(Request $req,Product $product)
    {
        try
        {
            $del = $product->delete();
            if($del)
                return \Responder::success($product)->respond(204);
            else throw new Exception($del);
        }
        catch(\Exception $e)
        {
            return \Responder::error("product_destroy_fail","Fail to Delete Product")->data([$e->__toString()])->respond();
        }
    }

    public function update(Request $req,Product $product){
        $data = $req->all();
        try
        {
            $res = $product->update($data);
            if($res)
                return \Responder::success($product)->respond(201);
            else throw new Exception($res);
        }
        catch(\Exception $e)
        {
            return \Responder::error("product_update_fail","Fail to Update Product")->data([$e->__toString()])->respond();
        }
    }

    public function old(Request $req)
    {
        // return redirect(route('admin.products.index'));
        $products = $this->product->all();
        return view('admin',['products'=>$products]);
    }

}
