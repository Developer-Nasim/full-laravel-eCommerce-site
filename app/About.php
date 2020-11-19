<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{   
    protected $fillable = [
        'logo','payment','number','email','address','lat','long','fb','tw','lk','ins','pin','yt','about_desc'
    ];
}
