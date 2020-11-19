<?php

namespace App\Http\Controllers\Front; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Banner;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Product;
use App\Newslatter;
use Image;
use DB;
use Carbon\Carbon;

class NewslatterController extends Controller
{
    public function newslatterAdd(Request $req){
        $eml =  Newslatter::where('emails', $req->email)->latest()->get();
        if (count($eml) == 0) {  
            Newslatter::insert([
                'emails'    => $req->email,
            ]);
        }
        return response()->json();
    }
}
