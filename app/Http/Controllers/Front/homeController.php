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
use App\AddBlog;
use Image;
use DB;
use Carbon\Carbon;

class homeController extends Controller{
        
    // Index page
    public function index(){
        $categ       = Category::latest()->get();
        $brands      = Brand::where('status', 1)->latest()->get();
        $banners     = Banner::latest()->get();
        $prodcuts    = Product::where('status', 1)->latest()->get();
        $AddBlog     = AddBlog::where('status', 1)->limit(3)->get();
        return view('welcome', compact('categ', 'brands', 'banners', 'AddBlog'));
    }

    // Form Model
    public function showData($id){
        $data = Product::where('id', $id)->first();
        return response()->json($data, 200);
    }
 
}
