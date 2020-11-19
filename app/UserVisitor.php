<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVisitor extends Model
{
    protected $fillable = [
        'country','ip','number'
    ];
}
