<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class whishList extends Model
{
    protected $fillable = [
        'product_id','qty','ip_address','username'
    ];
}
