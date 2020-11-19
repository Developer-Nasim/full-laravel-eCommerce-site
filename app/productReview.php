<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productReview extends Model
{
    protected $fillable = [
        'name','email','review','rate','product_id'
    ];
}
