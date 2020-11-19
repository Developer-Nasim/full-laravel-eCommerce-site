<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Product;
use App\Orde;
use App\Banner;
use Image;
use DB;
use Carbon\Carbon;

class AdmnController extends Controller
{
    
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function index(){
        $tpayments = Orde::where('status', 1)->latest()->get()->sum('payment');
        $neworder  = Orde::where('status', 1)->latest()->get();
        $tp        = Orde::where('status', 1)->latest()->get();
        $totalOrder= count($tp);
        return view('admin.home', compact('tpayments','neworder','totalOrder'));
    }
}
