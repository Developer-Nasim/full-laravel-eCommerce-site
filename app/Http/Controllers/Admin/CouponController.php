<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Coupon; 
use Carbon\Carbon;

class CouponController extends Controller
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


    // Index page
    public function index(){
        $all_data = Coupon::latest()->get();
        return view('admin.coupon', compact('all_data'));
    }

    // Insert
    public function save(Request $req){  
        $data =  Coupon::insert([
            'coupon_code'   => $req->code,
            'discount'      => $req->disc,
            'created_at'    => Carbon::now(), 
        ]);  
        $allData    = Coupon::where('discount', $req->disc)->first(); 
        return response()->json($allData, 200); 
    }  

    // active
    public function active($id){
        Coupon::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json();
    }

    // Inactive
    public function inactive($id){
        Coupon::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json();
    }
 
    // Delete
    public function delete($id){  
        Coupon::find($id)->delete();
        return response()->json();
    }

 


}
