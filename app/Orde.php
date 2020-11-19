<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orde extends Model
{
    // protected $fillable = ['name','email','phone','amount','address','status','transaction_id','currency'];
    protected $fillable = ['f_name','l_name','country_name','address','address_optional','city','phone_number','email','mmessage','status','customer','payment','ip'];
}
