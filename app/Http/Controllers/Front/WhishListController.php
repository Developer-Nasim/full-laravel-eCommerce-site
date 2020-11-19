<?php

namespace App\Http\Controllers\Front; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Product;
use App\AddCart;
use App\whishList;
use Image;
use DB;
use Carbon\Carbon;

class WhishListController extends Controller{

    // Index page
    public function index(){
        $mainCategory = Category::latest()->get();
        $allBrand     = Brand::latest()->get();
        $allWhilist   = whishList::all()->where('status', 1)->where('ip_address', request()->ip());
        return view('front.wishlist', compact('mainCategory', 'allBrand','allWhilist'));
    }
         
    // Add to Whislist
    public function addWhish(Request $req, $id){
        $ip = request()->ip();
        $test = whishList::where('ip_address', $ip)->where('status', 1)->Where('product_id', $id)->latest()->get();
        if (count($test) > 0) { 
            echo "already have";
        }else{
                whishList::insert([
                'product_id'  => $id,
                'qty'         => '1',
                'ip_address'  => $ip,
                'username'    => 'nasim',
                'created_at'  => Carbon::now()
            ]);
        }

        $qt     = whishList::where('ip_address', $ip)->where('status', 1)->sum('qty');
        return response()->json($qt);
    }
    
    // Delete
    public function delete($id){
        whishList::find($id)->delete();
        $allWhilist   = whishList::all()->where('status', 1)->where('ip_address', request()->ip());
        $total        = count($allWhilist);
        return response()->json($total);
    }

    // Whish to cart
    public function wishtoCart(Request $req, $id){
        $ip = request()->ip();
        whishList::where('id', $id)->where('status', 1)->where('ip_address', $ip)->update([
            'status' => 2
        ]);
        AddCart::insert([
            'product_id'  => $id,
            'qty'         => '1',
            'price'       => $req->product_price,
            'total'       => $req->product_price*1,
            'ip_address'  => $ip,
            'username'    => 'nasim',
            'created_at'  => Carbon::now()
        ]);
        $allWhilist   = whishList::all()->where('status', 1)->where('ip_address', $ip);
        $total        = count($allWhilist);
        return response()->json($total);
    }
    
}
