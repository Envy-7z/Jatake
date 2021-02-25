<?php

namespace App\Observers;
use App\Product;
use App\Library\Libs;

class ProductOberver
{
    //

    public function creating(Product $product)
    {
        // $product->dimention = json_encode($product->dimention);

        $product->img = Libs::_()->arrayNullFilter($product->img);
        $product->link = Libs::_()->arrayNullFilter($product->link);
        // $product->type = Libs::_()->arrayNullFilter($product->type);
    }

    public function updating(Product $product)
    {
        // $product->dimention = json_encode($product->dimention);
        $product->img = Libs::_()->arrayNullFilter($product->img);
        $product->link = Libs::_()->arrayNullFilter($product->link);
        unset($product->brand);
    }

    /**
     * Handle the Products "retrieved" event.
     *
     * @param  \App\Products  $product
     * @return void
     */

    public function retrieved(Product $product)
    {
        // $product->dimention = json_decode($product->dimention);
        $product->img = json_decode($product->img);
        $product->link = json_decode($product->link);
        $product->brand = $product->brand();
    }

}
