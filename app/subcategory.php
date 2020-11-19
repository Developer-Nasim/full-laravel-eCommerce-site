<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable = ['sub_name','category_id'];
    public function mainCategory(){
        return $this->belongsTo('App\Category', 'category_id');
    } 
}
