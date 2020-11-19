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
use App\AddtoCompare;
use Image;
use DB;
use Carbon\Carbon;

class AddtoCompareController extends Controller
{
    // Add to cart
    public function addCompare(Request $req, $id){
        $ip = request()->ip(); 
        $test = AddtoCompare::where('ip_address', $ip)->Where('product_id', $id)->latest()->get();
        if (count($test) == 1) {
            AddtoCompare::where('ip_address', $ip)->Where('product_id', $id)->create([ 
                'updated_at'  => Carbon::now()
            ]);
        }else{
            AddtoCompare::create([
                'product_id'  => $id,
                'qty'         => '1',
                'ip_address'  => $ip,
                'username'    => 'nasim',
                'created_at'  => Carbon::now()
            ]);
        }

        $qt     = AddtoCompare::all()->where('ip_address', $ip);
        return response()->json(count($qt));
    }

}
