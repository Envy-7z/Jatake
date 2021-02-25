<?php

namespace App;

use App\Helpers\Rest;

class ApiProducts extends Rest
{
    protected $uri = 'products';

    public function getProductsById($id)
    {
        return $this->get('/'.$id);
    }

    public function getProductsAll()
    {
        return $this->get();
    }

    public function createProduct($data)
    {
        return $this->post('',$data);
    }

    public function deleteProduct($id)
    {
        return $this->delete('/'.$id);
    }

    public function updateProduct($id,$data)
    {
        return $this->put('/'.$id,$data);
    }

    public function getProductsRecomend($id)
    {
        return $this->get('/recomend/'.$id);
    }
}
