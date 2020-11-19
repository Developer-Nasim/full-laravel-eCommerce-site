<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserVisitor;

class UserVisitorController extends Controller{
    
    public function visitor(Request $request){
        UserVisitor::insert([
            ''
        ]);
    }
    
}
