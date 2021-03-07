<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admins extends Authenticatable
{
    //
    use HasApiTokens,Notifiable;

    protected $fillable=[
        'name','password','email','level'
    ];

    protected $hidden=[
        'password','remember_token'
    ];

}
