<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Okipa\LaravelModelJsonStorage\ModelJsonStorage;
use App\Brand;
class Product extends Model
{
    // use ModelJsonStorage;

    // protected $table = 'products';
    protected $fillable = [
        'short','name',
        'brand_id','desc',
        'link',
        'type','img',
        'qty',
        'price','status'
    ];

    public function scopeFilterByBrand($q)
    {
        // return
    }

    public function getFillable()
    {
        return $this->fillable;
    }

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

    public function scopeDetail($q,$id)
    {
        return $q->where('id',$id)->orWhere('short',$id);
    }

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public  function scopeLikeOr($query, $field, $value){
        return $query->whereOr($field, 'LIKE', "%$value%");
    }

    // public function brand()
    // {
    //     $brand = Brand::find(@$this->brand_id);
    //     return ["id"=>$brand['id'],"name"=>$brand['name']];
    //     // return $this->belongsTo('App\Brand', 'id','name')->all();
    // }

    public function brand()
    {
        $brand = $this->belongsTo('App\Brand')->get(['name','id'])->all();
        // dd($brand[0]);
        if(!empty($brand))
            return $brand[0];
    }

}
