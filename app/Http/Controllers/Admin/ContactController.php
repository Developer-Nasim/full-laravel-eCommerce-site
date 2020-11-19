<?php
namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Contact;
use Image;
use Carbon\Carbon;

class ContactController extends Controller
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


    public function indexFront(){
        return view('front.contact');
    }

    public function messageSend(Request $req){
        Contact::insert([
            'name'      => $req->name,
            'email'     => $req->email,
            'subject'   => $req->subject,
            'message'   => $req->message,
            'created_at'=> Carbon::now()
        ]);
        return response()->json();
    }
} 