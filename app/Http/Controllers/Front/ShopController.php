<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Product; 
use Image;
use DB;
use Carbon\Carbon;

class ShopController extends Controller{


    // Index page
    public function index(){
        $brands     = Brand::where('status', 1)->latest()->get();
        $categs     = Category::where('status', 1)->latest()->get();
        $sbcategs   = subcategory::latest()->get();
        $products   = Product::where('status', 1)->latest()->paginate(10);
        return view('front.shop', compact('brands','categs','sbcategs','products'));
    }

    // Popular Category
    public function popularCategory($cateName){
        $name           = $cateName;
        $categs         = Category::where('name', $cateName)->first();
        $shopData       = Product::where('status', 1)->where('category', $categs->id)->latest()->paginate(10);
        return view('front.popular_category', compact('shopData', 'name'));
    }

    // Searchh page
    public function search(Request $req){
        $keys   = $req->search_key;
        $search = Product::where('title', 'LIKE', "%$keys%")->latest()->get();
        return view('front.search_shop', compact('search', 'keys'));
    }
 
}
