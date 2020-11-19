<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddCart extends Model
{
    protected $fillable = [
        'product_id','qty','price','total','ip_address','username'
    ];
}
