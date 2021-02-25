<?php

namespace App\Observers;
use App\Brand;
use App\Library\Libs;
class BrandObserver
{
    //

    public function creating(Brand $brand)
    {
        $brand->img = Libs::_()->arrayNullFilter($brand->img);
        $brand->link = Libs::_()->arrayNullFilter($brand->link);
    }

    public function updating(Brand $brand)
    {
        $brand->img = Libs::_()->arrayNullFilter($brand->img);
        $brand->link = Libs::_()->arrayNullFilter($brand->link);
    }

    /**
     * Handle the Product "retrieved" event.
     *
     * @param  \App\Brand  $brand
     * @return void
     */

    public function retrieved(Brand $brand)
    {
        if(!empty($brand->img))
        $brand->img = json_decode($brand->img);
        if(!empty($brand->link))
        $brand->link = json_decode($brand->link);
        // $brand->product = $brand->products();
    }

}
