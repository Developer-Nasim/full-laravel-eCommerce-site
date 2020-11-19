<?php
namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Pages;
use App\Orde;
use App\Contact;
use Image;
use Carbon\Carbon;

class OrderController extends Controller
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


    // Index
    public function index(){ 
        return view('admin.order');
    }

    // show message
    public function showNum($id){
        $sNum = Orde::where('id', $id)->first();
        return response()->json($sNum);
    }

    // show email
    public function showEmail($id){
        $sEmail = Orde::where('id', $id)->first();
        return response()->json($sEmail);
    }
}
