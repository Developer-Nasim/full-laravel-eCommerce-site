<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnderSub extends Model{
    protected $fillable =[
        'category_id','sub_category','under_sub_category'
    ];
    public function mainCateg(){
        return $this->belongsTo('App\Category','category_id');
    } 
}
