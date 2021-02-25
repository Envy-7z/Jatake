<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Brand;
use App\Library\Libs;


class HomeController extends Controller
{
    //
    public function __construct(Request $req)
    {
        $this->products = new Product();
        $this->brand = new Brand();
        $this->lib = new Libs();

    }
    public function index(Request $req)
    {
        $param = arr2obj($req->all());
        $brand = function() use ($param)
        {
            return $this->brand->pagination(@$param->page,@$param->per_page,@$param->search);
        };

       
        try
        {
            $data['brands'] = $brand();
            $data['page'] = 'home';
            return view("index",$data);
            // return \Responder::success($product())->with('draw',empty($param->draw)?null:$param->draw)->respond();
        }
        catch(\Exception $e)
        {
            throw $e;
            // return \Responder::error("product_get_fail","Fail to Get Product")->data([$e->__toString()])->respond();
        }
        //echo "masuk index";
    }

    public function search(Request $req)
    {
        $param = arr2obj($req->all());
        $products = function() use ($param)
        {
            return $this->products->like('name',$param->s)->likeOr('desc',$param->s)->get()->all();
        };
        try
        {
            $data['products'] = $products();
            $data['page'] = $param->s;
            return view("Public.product-search",$data);
        }
        catch(\Exception $e)
        {
            throw $e;
        }

    }

    public function term_condition(Request $req){
        $data['page'] = 'term-condition';
        return view("term-cond",$data);
    }
}
