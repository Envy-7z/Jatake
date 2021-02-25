<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = [
        'product_id','email', 'reviews'
    ];
    protected $dates = ['created_at'];
}
