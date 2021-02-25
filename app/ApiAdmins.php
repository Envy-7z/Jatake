<?php

namespace App;

use App\Helpers\Rest;

class ApiAdmins extends Rest
{
    //
    protected $uri = 'admin';
    public function loginAdmin($data)
    {
        return $this->post('/login',$data);
    }
}
