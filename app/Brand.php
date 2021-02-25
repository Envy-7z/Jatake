<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use League\Fractal\Pagination\Cursor;
use App\Product;

class Brand extends Model
{
    //
    protected $fillable = [
        'name','desc','link','img'
    ];

    public function scopePagination($q,$page=1,$perPage=10,$search="")
    {
        $curr = ($page-1)*$perPage;
        if ($page > 1) {
            $data = $q->like('name',$search)->likeOr('desc',$search)->skip($curr)->paginate($perPage);
        } else {
            $data = $q->like('name',$search)->likeOr('desc',$search)->paginate($perPage);
        }
        return $data;
    }

    public function getBrandByType($type)
    {
        $data = Product::get(['brand_id','type'])->where('type',\strtoupper($type))->toArray();
        // dd($data);
        $data = array_map(function($val){
            return $val['brand_id'];
        },$data);
        return Brand::find($data);
    }

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public  function scopeLikeOr($query, $field, $value){
        return $query->whereOr($field, 'LIKE', "%$value%");
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function productsFilterType($type)
    {
        return $this->hasMany('App\Product')->where('products.type',$type);
    }
}
