<?php

namespace App\Http\Controllers\Home;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsControl extends Controller
{

    public function __construct()
    {
        $this->brand = new Brand();
        $this->products = new Product();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd(Brand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
        $data['brand'] = $brand;
        $data['products'] = $brand->products()->get()->all();
        $data['page'] = 'Brand';
        return view("Public.brand-show",$data);
    }

    public function showBrandByType(Request $req, $type)
    {
        $param = arr2obj($req->all());
        $brand = function() use ($param,$type)
        {
            return $this->brand->getBrandByType($type);
        };
        try
        {
            $data['brands'] = $brand();
            $data['page'] = $type;
            return view("Public.brand-show-type",$data);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
