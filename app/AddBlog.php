<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddBlog extends Model{
    protected $fillable = [
        'Title','Body','tags','status'  
    ];
}
