<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Library\Libs;

class BrandsControl extends Controller
{
    //
    public function __construct(Request $req)
    {
        $this->brand = new Brand();
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
        return view('Admin.brands',['page'=>'Brands']);
    }

    public function create(Request $req)
    {
        try
        {
            $data = $req->all();
            $this->brand->create($data);
            return \Responder::success($this->brand)->respond(201);
        }
        catch(\Exception $e)
        {
            return \Responder::error("brand_create_fail","Fail to Create Brand")->data([$e->__toString()])->respond();
        }
    }

    public function store(Request $req){
        $param = arr2obj($req->all());
        $brand = function() use ($param)
        {
            return $this->brand->pagination(@$param->page,@$param->per_page,@$param->search);
        };
        try
        {
            return \Responder::success($brand())->with('draw',empty($param->draw)?null:$param->draw)->respond();
        }
        catch(\Exception $e)
        {
            return \Responder::error("brand_get_fail","Fail to Get Brand")->data([$e->__toString()])->respond();
        }
    }

    public function show(Request $req,Brand $brand){
        try
        {
            return \Responder::success($brand)->respond(201);
        }
        catch(\Exception $e)
        {
            return \Responder::error("brand_get_by_id_fail","Fail to Get by ID Brand")->data([$e->__toString()])->respond();
        }
    }

    public function destroy(Request $req,Brand $brand)
    {
        try
        {
            $del = $brand->delete();
            if($del)
                return \Responder::success($brand)->respond(204);
            else throw new Exception($del);
        }
        catch(\Exception $e)
        {
            return \Responder::error("brand_destroy_fail","Fail to Delete Brand")->data([$e->__toString()])->respond();
        }
    }

    public function update(Request $req,Brand $brand){
        $data = $req->all();
        try
        {
            $res = $brand->update($data);
            if($res)
                return \Responder::success($brand)->respond(201);
            else throw new Exception($res);
        }
        catch(\Exception $e)
        {
            return \Responder::error("brand_update_fail","Fail to Update Brand")->data([$e->__toString()])->respond();
        }
    }

}
