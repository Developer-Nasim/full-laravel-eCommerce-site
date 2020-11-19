<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddtoCompare extends Model
{
    protected $fillable = [
        'product_id','qty','ip_address','username'
    ];
} 