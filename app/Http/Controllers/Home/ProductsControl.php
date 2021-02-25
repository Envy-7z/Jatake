<?php

namespace App\Http\Controllers\Home;

use App\Brand;
use App\Reviews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Library\Libs;
use Exception;
use Responder;
use Carbon\Carbon;

class ProductsControl extends Controller
{
    //

    public function __construct()
    {
        $this->lib = new Libs();
        $this->products = new Product();
        $this->brand = new Brand();
    }

    public function index(Request $req)
    {
        abort(404);
    }

    public function show(Request $req, $id)
    {
        try {
            $resp = Product::detail($id)->firstOrFail();
            $reviews = Reviews::where('product_id', $id)->paginate(5);
            $data['page'] = 'detail';
            $recomend = Product::orderBy('views')->get()->toArray();
            $recomend = array_slice($recomend, 0, 4);
            $data['recomends'] = arr2Obj($recomend);
            $data['product']=$resp;
            $data['reviews']=$reviews;
            // dd($data);
            return view('detail',$data);
        }
        catch (\Exception $e)
        {
            // throwing previous error
            throw $e;
        }
    }

    public function showProductByBrandAndType(Request $req, $brand_id, $type)
    {
        $param = arr2obj($req->all());
        $products = function() use ($param,$brand_id,$type)
        {
            return $this->products->where(['brand_id'=>$brand_id,'type'=>$type])->get()->all();
        };
        try
        {
            $data['brand'] = $this->brand->find($brand_id);
            $data['products'] = $products();
            $data['page'] = $type;
            return view("Public.product-show-brand-type",$data);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

    public function showProductByBrand(Request $req, $brand_id)
    {
        $param = arr2obj($req->all());
        $products = function() use ($param,$brand_id)
        {
            return $this->products->where(['brand_id'=>$brand_id])->get()->all();
        };
        try
        {
            $data['brand'] = $this->brand->find($brand_id);
            $data['products'] = $products();
            $data['page'] = "";
            return view("Public.product-show-brand-type",$data);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

    public function store(Request $req){

        try
        {
            $data = $req->all();
            $product = new Product($data);
            $product->save();
            dd($product);
            return Responder::success($product)->respond(201);
        }
        catch(Exception $e)
        {
            Responder::error("product_create_fail","Fail to Create Product")->data($e)->respond();
        }

    }

    public function storeReviews(Request $req){
        try
        {
            $data = $req->all();
            $reviews = new Reviews($data);
            $reviews->save();
            return Responder::success($reviews)->respond(201);
        }
        catch(Exception $e)
        {
            Responder::error("product_create_fail","Fail to Add reviews")->data($e)->respond();
        }
    }
    public function update(Request $req, $id)
    {
        try
        {
            $data = $req->all();
            $product = Product::find($id);
            $product->update($data);
            return Responder::success($product)->respond(201);
        }
        catch(Exception $e)
        {
            return Responder::error("product_update_fail","Fail to Update Product")->data($e)->respond();
        }
    }

    public function destroy(Request $req,$id)
    {
        try{
            $product = Product::find($id);
            $delete = $product->delete();
            return Responder::success($delete)->respond(204);
        }
        catch(\Exception $e)
        {
            return Responder::error("product_delete_fail","Fail to Delete Product")->data($e)->respond();
        }
    }
}
