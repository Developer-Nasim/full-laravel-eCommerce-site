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
use Image;
use DB;
use Carbon\Carbon;

class AddCartController extends Controller{

    // Add to cart
    public function addCart(Request $req, $id){
        $ip = request()->ip();  
        $test = AddCart::where('ip_address', $ip)->Where('product_id', $id)->latest()->get();
        if (count($test) > 0) {
            $test = AddCart::where('ip_address', $ip)->Where('product_id', $id)->increment('qty');
        }else{
                AddCart::insert([
                'product_id'  => $id,
                'qty'         => '1',
                'price'       => $req->product_price,
                'total'       => $req->product_price*1,
                'ip_address'  => $ip,
                'username'    => 'nasim',
                'created_at'  => Carbon::now()
            ]);
        }

        $qt     = AddCart::where('ip_address', $ip)->sum('qty');
        $prc    = AddCart::where('ip_address', $ip)->sum('price');
        $total  = $qt*$prc;
        return response()->json([
            'qty'      =>$qt,
            'price'    =>$prc,
            'total'    =>$total,
        ], 200);

    }  

    // Cart Data
    public function cartData(){
        $ip = request()->ip();
        $allcart = AddCart::all()->where('ip_address', $ip)->where('status', 1); 
        return view('front.cart', compact('allcart'));
    } 
    
    // Upddate
    public function Update(Request $req, $id){ 
        $ip = request()->ip();
        $allcart = AddCart::where('id', $id)->where('ip_address', $ip)->first();  
        AddCart::where('ip_address', $ip)->where('id', $id)->update([
            'qty'        => $req->qty,
            'total'       => $allcart->price*$req->qty,
            'updated_at'  => Carbon::now(),
        ]); 
        return response()->json();
    }


    // Delete
    public function delete($id){  
        AddCart::find($id)->delete();
        $AddCart   = AddCart::all()->where('ip_address', request()->ip())->sum('qty'); 
        return response()->json($AddCart);
    }

}
