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
use App\productReview;
use App\AddCart;
use App\Orde;
use App\whishList;
use Image;
use DB;
use Carbon\Carbon;

class checkOut extends Controller
{
    public function index(){ 
        $allcart     = AddCart::where('ip_address', request()->ip())->latest()->get(); 
        return view('front.checkout', compact('allcart'));
    }
    public function placeOrder(Request $req){
        Orde::insert([
            'f_name'            => $req->first_name,
            'l_name'            => $req->last_name,
            'country_name'      => $req->country,
            'address'           => $req->address,
            'address_optional'  => $req->address_optional,
            'city'              => $req->city,
            'phone_number'      => $req->number,
            'email'             => $req->email,
            'mmessage'          => $req->order_note,
            'customer'          => 'Nasim',
            'payment'           => $req->payment,
            'ip'                => request()->ip(),
            'created_at'        => Carbon::now()
        ]);

        AddCart::where('ip_address', request()->ip())->update(['status' => 2]);
        whishList::where('ip_address', request()->ip())->update(['status' => 2]);
        return view('front.success');
    }
}
