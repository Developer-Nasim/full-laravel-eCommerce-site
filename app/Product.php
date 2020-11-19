<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $fillable = [
        'brand','category','subcategory','undercategory','title','url','price','quantity','discount','avaiable','colors','product_img','short_desc','full_desc' 
    ];
}
